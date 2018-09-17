<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/7
 * Time: 20:09
 */

namespace app\api\service;

use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use think\Request;
use app\api\model\User as UserModel;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code)
    {
        $this->code=$code;
        $this->wxAppID=config('wx.app_id');
        $this->wxAppSecret=config('wx.app_secret');
        $this->wxLoginUrl=sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);
    }


    public function get()
    {
        $result=curl_get($this->wxLoginUrl);
        $wxResult=json_decode($result,true);
        if (empty($wxResult)){
            throw new Exception('获取session_key和openID异常，微信内部错误');
        }else{
            $loginFail=array_key_exists('errcode',$wxResult);
            if ($loginFail){
                throw new WeChatException();
            }else{
               return $this->grantToken($wxResult);

            }
        }
    }

    //获取token令牌
    private function grantToken($wxResult){
        //第一步先拿到openid
        //第二步，判断数据库user表是否存在openid
        //如果存在，获取user表openid对应的id号返回
        //如果不存在，则在user表新增记录
        //第三步，生成令牌，准备缓存，写入缓存  scope用户调用api的权限
        //缓存  key：令牌   value: wxResult ,uid , scope

        $openid=$wxResult['openid'];
        $user=UserModel::getByOpenID($openid);
        if ($user){
            $uid=$user->id;
        }else{
            $uid=$this->newUser($openid);
        }

        $cachedValue=$this->prepareCachedValue($wxResult,$uid);
        $token=$this->saveToCache($cachedValue);
        return $token;
    }

    //在user表新增用户记录,返回当前用户id号
    private function newUser($openid)
    {
        $user=UserModel::create([
            'openid'=>$openid
        ]);
        return $user->id;
    }

    //准备缓存需要的数据
    private function prepareCachedValue($wxResult,$uid)
    {
        $cachedValue=$wxResult;
        $cachedValue['uid']=$uid;
        $cachedValue['scope']=ScopeEnum::User;
        return $cachedValue;
    }
    //写入缓存
    private function saveToCache($cachedValue)
    {
        //生成token
        $key=self::generateToken();
        $value=json_encode($cachedValue);
        $expire_in=config('setting.token_expire_in');
        $request=cache($key,$value,$expire_in);
        if (!$request){
            throw new TokenException([
                'msg'=>'服务器缓存异常',
                'errorCode'=>10005
            ]);
        }
        return $key;
    }

}
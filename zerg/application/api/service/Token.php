<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/11
 * Time: 10:58
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;


class Token
{
    //生成token
    public static function generateToken()
    {
        //32个字符组成随机字符串
        $randChars=getRandChar(32);
        //进行md5加密
        // 两组组字符串进行md5加密randchars,盐
        $salt=config('secure.token_salt');

        return md5($randChars.$salt);
    }


    /**
     * 获取缓存中的变量
     * @key 传入要获取的键值
     */
    public static function getCurrentTokenVar($key)
    {
        //获取token，用户通过http请求的header传递token
        $token=Request::instance()->header('token');
        $vars=Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }
        else{
            if (!is_array($vars)){
                $vars=json_decode($vars,true);
            }
            if (array_key_exists($key,$vars)){
                return $vars[$key];
            }else{
                throw new Exception('尝试获取的token变量不存在');
            }
        }
    }


    //根据令牌获取uid
    public static function getCurrentUid()
    {
        $uid=self::getCurrentTokenVar('uid');
        return $uid;
    }

    //address接口访问权限检测，用户和管理员可以访问
    public static function needPrimaryScope()
    {
        $scope=self::getCurrentTokenVar('scope');
        if($scope){
            if ($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }

        }else{
            throw new TokenException();
        }
    }

    //order接口访问权限检测,只有用户可以访问
    public  static function needExclusiveScope()
    {
        $scope=self::getCurrentTokenVar('scope');
        if($scope){
            if ($scope == ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }

        }else{
            throw new TokenException();
        }
    }

}
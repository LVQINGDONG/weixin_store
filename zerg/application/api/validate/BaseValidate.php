<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/13
 * Time: 21:31
 */

namespace app\api\validate;
use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        //第一步获取url的所有参数
        $request=Request::instance();
        $params=$request->param();

        //第二步使用check（）校验参数
        $result=$this->batch()->check($params);
        if (!$result){
            //抛出自定义异常
            $e=new ParameterException();
            $e->msg=$this->error;
            throw $e;
            //抛出系统默认异常
//            $error=$this->error;
//            throw new Exception($error);
        }else{
            return true;
        }
    }

    //validate验证器内置验证规则没有方法验证id是否为正整数，所以自定义一个方法
    protected function isPositiveInteger($value,$rule='',$data='',$field='')
    {
        //判断id是否为数字，整数，大于0
        if (is_numeric($value)&&is_int($value+0)&&($value+0)>0){
            return true;
        }else{
            return false;
//            return $field.'必须是正整数';
        }
    }



    //电话号码验证
    protected function isMobile($value)
    {
        $rule='/^1[34578]\d{9}$/';
        $result=preg_match($rule,$value);
        if ($result){
            return true;
        }else{
            return false;
        }
    }



    //验证Token传入的code是否为空
    protected function isNotEmpty($value)
    {
        if(Empty($value)){
            return false;
        }else{
            return true;
        }
    }

    //过滤器，接收传入的所有参数，过滤掉没有被rule规则验证过的参数
    public function getDataByRule($arrays)
    {
//        if (array_key_exists('uid')|array_key_exists('user_id')){
//            throw new ParameterException([
//                'msg'=>'传入的参数包含非法的uid或者user_id'
//            ]);
//        }

        $newArray=[];
        foreach ($this->rule as $key =>$value){
            $newArray[$key]=$arrays[$key];
        }
        return $newArray;
    }

}
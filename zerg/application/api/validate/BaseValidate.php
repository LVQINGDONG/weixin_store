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
}
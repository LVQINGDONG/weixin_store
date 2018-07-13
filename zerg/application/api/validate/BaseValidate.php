<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/13
 * Time: 21:31
 */

namespace app\api\validate;
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
        $result=$this->check($params);
        if (!$result){
            $error=$this->error;
            throw new Exception($error);
        }else{
            return true;
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/13
 * Time: 20:50
 */

namespace app\api\validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule=[
        'id'=>'require|isPositiveInteger'
    ];


    //validate验证器内置验证规则没有方法验证id是否为正整数，所以自定义一个方法
    protected function isPositiveInteger($value,$rule='',$data='',$field='')
    {
        //判断id是否为数字，整数，大于0
        if (is_numeric($value)&&is_int($value+0)&&($value+0)>0){
            return true;
        }else{
            return $field.'必须是正整数';
        }
    }
}
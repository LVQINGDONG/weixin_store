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
    protected $message=[
      'id'=>'id必须是正整数'
    ];

}
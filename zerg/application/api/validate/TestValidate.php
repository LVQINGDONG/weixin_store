<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/13
 * Time: 20:11
 */

namespace app\api\validate;
use think\Validate;

class TestValidate extends Validate
{
    protected $rule=[
        'name'=>'require|max:10',
        'email'=>'email'
    ];
}
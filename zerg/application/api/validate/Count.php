<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/5
 * Time: 20:41
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule=[
        'count'=>'isPositiveInteger|between:1,15'
    ];
}
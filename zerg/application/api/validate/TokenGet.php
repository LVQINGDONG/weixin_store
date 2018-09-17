<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/7
 * Time: 19:51
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule=[
        'code'=>'require|isNotEmpty'
    ];
    protected $message=[
      'code'=>'url传入code为空，无法获取Token'
    ];
}
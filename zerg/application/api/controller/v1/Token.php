<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/7
 * Time: 19:50
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;


class Token
{
    public function getToken($code='')
    {
        (new TokenGet())->goCheck();
        $ut=new UserToken($code);
        $token=$ut->get();
        return [
          'token'=>$token
        ];

    }
}
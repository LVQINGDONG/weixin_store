<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/7
 * Time: 20:07
 */

namespace app\api\model;


class User extends BaseModel
{
    public function address()
    {
        return $this->hasOne('UserAddress','user_id','id');
    }

    public static function getByOpenID($openid)
    {
        $user=self::where('openid','=',$openid)->find();
        return $user;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/12
 * Time: 21:48
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden=['id','user_id','delete_time'];
}
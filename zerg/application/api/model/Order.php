<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/17
 * Time: 15:30
 */

namespace app\api\model;


class Order extends BaseModel
{
    protected $hidden=['user_id','delete_time','update_time'];
}
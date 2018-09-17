<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/11
 * Time: 19:48
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden=['id','delete_time','product_id'];
}
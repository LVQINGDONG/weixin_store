<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/11
 * Time: 19:44
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden=['img_id','delete_time','product_id'];

    public function imgUrl()
    {
        return $this->belongsTo('Image','img_id','id');
    }
}
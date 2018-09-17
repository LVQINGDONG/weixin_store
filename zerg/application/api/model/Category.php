<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/6
 * Time: 18:27
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden=['delete_time','update_time','topic_img_id'];

    public function img()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }
}
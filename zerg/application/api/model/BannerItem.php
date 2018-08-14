<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/23
 * Time: 3:11
 */

namespace app\api\model;


use think\Model;

class BannerItem extends Model
{
    protected $hidden=['id','img_id','banner_id','delete_time','update_time'];

    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }
}
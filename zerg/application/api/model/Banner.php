<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/18
 * Time: 13:57
 */

namespace app\api\model;


use think\Db;
use think\Exception;
use think\Model;

class banner extends BaseModel
{
//  隐藏数据库表里面对客户端没用的字段信息
    protected $hidden=['delete_time','update_time'];

    public function items(){
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id){
        $banner=self::with(['items','items.img'])->find($id);
        return $banner;
    }
}
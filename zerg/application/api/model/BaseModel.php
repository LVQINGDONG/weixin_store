<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/8/17
 * Time: 18:49
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    protected function prefixImgUrl($value,$data){
            $finalUrl=$value;
            if ($data['from']==1){
                $finalUrl=config('setting.img_prefix').$value;
            }
            return $finalUrl;
        }
}
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/4
 * Time: 19:43
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden=['update_time','delete_time','topic_img_id','head_img_id'];

    public function topicImg()
    {
        return $this->belongsTo('Image','topic_img_id','id');
    }
    public function headImg()
    {
        return $this->belongsTo('Image','head_img_id','id');
    }
    public function products()
    {
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }

//    /**
//     * 查询对应专题下的产品数据
//     * @return 一个专题的下的所有产品信息
//     */
    public static function getThemeWithProducts($id)
    {
        $theme=self::with('products,topicImg,headImg')->find($id);
        return $theme;
    }
}
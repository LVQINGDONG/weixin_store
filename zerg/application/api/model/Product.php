<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/4
 * Time: 19:43
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden=[
        'delete_time','update_time','create_time','category_id','from','pivot'
    ];
    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }

    public static function getMostRecent($count)
    {
        $products=self::limit($count)->order('create_time desc')->select();
        return $products;
    }

    public static function getProductsByCategoryID($categoryID)
    {
        $products=self::where('category_id','=',$categoryID)->select();
        return $products;
    }

    public function imgs()
    {
        return $this->hasMany('ProductImage','product_id','id');
    }
    public function properties()
    {
       return $this->hasMany('ProductProperty','product_id','id');
    }


    //获取商品的详细信息
    public static function getProductDetail($id)
    {
        $product=self::with(['imgs','properties','imgs.imgUrl'])->find($id);
        return $product;
    }

}
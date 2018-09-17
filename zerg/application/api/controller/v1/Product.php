<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/5
 * Time: 20:37
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;
use think\model\Collection;

class Product
{
    /**
     * 获取首页最新商品信息
     * @url http://localhost/zerg/public/index.php/api/v1/product/recent?count=15
     * @count 传入返回商品数据的数量，最小为1，最大为15
     */
    public function getRecent($count=15)
    {
        (new Count())->goCheck();
        $products=ProductModel::getMostRecent($count);
        if (!$products){
            throw new ProductException();
        }
        /**
         * 隐藏summary字段的方法
         * collection()将数组对象$products转换成数据集
         * 数据集可以用hidden()指定要隐藏的字段
         */
        $collections=collection($products);
        $products=$collections->hidden(['summary']);
        return $products;
    }


    /**
     *  查询分类页下的商品
     * @param $id 传入要查询的商品的category_id
     * @url http://localhost/zerg/public/index.php/api/v1/product/by_category？id=
     */

    public function getAllInCategory($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $products=ProductModel::getProductsByCategoryID($id);
        if (!$products){
            throw new ProductException();
        }
        /**
         * 隐藏summary字段的方法
         * collection()将数组对象$products转换成数据集
         * 数据集可以用hidden()指定要隐藏的字段
         */
        $collections=collection($products);
        $products=$collections->hidden(['summary']);
        return $products;
    }



    /**
     * 显示商品的详细信息（点击商品图片进入详细信息页面）
     * @param $id 商品的id号
     * @url   http://localhost/zerg/public/index.php/api/v1/product/:id
     */

    public function getOne($id)
    {
        (new IDMustBePostiveInt())->goCheck();
        $product=ProductModel::getProductDetail($id);
        if (!$product){
            throw new ProductException();
        }
        return $product;

    }
}
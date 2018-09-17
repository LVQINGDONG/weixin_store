<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/6
 * Time: 18:25
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategories(){
        $categories=CategoryModel::with('img')->select();
        if (!$categories){
            throw new CategoryException();
        }
        return $categories;
    }
}
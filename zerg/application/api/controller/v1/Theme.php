<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/4
 * Time: 19:43
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ThemeMissException;
use think\Collection;

class Theme
{
    /**
     * @url api/:version/theme?ids=id1,id2,id3
     * @返回专题数据
     */

    public function getSimpleList($ids='')
    {
        (new IDCollection())->goCheck();
        $ids=explode(',',$ids);
        $result=ThemeModel::with('topicImg,headImg')->select($ids);
        if (!$result){
            throw new ThemeMissException();
        }
        return $result;
    }

    /**
     *@url api/:version/theme/:id
     * @返回点击专题页面后显示对应的产品数据
     */
    public function getComplexOne($id)
    {
        (new IDMustBePostiveInt())->goCheck();
//        $theme=ThemeModel::with('products,topicImg,headImg')->find($id);
        $theme=ThemeModel::getThemeWithProducts($id);
        if (!$theme){
            throw new ThemeMissException();
        }
        return $theme;
    }


}
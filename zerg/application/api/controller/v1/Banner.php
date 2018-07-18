<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/13
 * Time: 17:32
 */

namespace app\api\controller\v1;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;


class Banner
{
    /**
     * 获取指定banner表id下的banner信息
     * @ url  /banner/:id
     * @ http GET
     * @ id banner的id号
     */
    public function getBanner($id){

        (new IDMustBePostiveInt())->goCheck();

        $banner=BannerModel::getBannerByID($id);
        if (!$banner){
            throw new BannerMissException();
        }
        return $banner;

    }

}
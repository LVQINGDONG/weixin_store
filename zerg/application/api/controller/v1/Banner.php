<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/13
 * Time: 17:32
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;
use app\api\validate\TestValidate;
use think\Validate;

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
        echo "通过";
//        $date=[
//           'id'=>$id
//        ];
//        $validate=new IDMustBePostiveInt();
//        $result=$validate->batch()->check($date);
//        if ($result) {
//            echo "通过";
//        }else{
//            echo '不通过';
//        }
    }

}
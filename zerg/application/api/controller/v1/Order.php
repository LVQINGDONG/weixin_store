<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/15
 * Time: 19:06
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\OrderPlace;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Controller;
use app\api\service\Token as TokenService;
use app\api\service\Order as OrderService;

class Order extends BaseController
{
    //验证权限
    protected $beforeActionList=[
        'checkExclusiveScope'=>['only'=>'placeOrder']
    ];

    /**
     * 用户下单接口
     * 请求类型：post
     * @url http://localhost/zerg/public/index.php/api/v1/order
     */
    public function placeOrder()
    {
        //验证参数
        (new OrderPlace())->goCheck();
        $products=input('post.products/a');
        $uid=TokenService::getCurrentUid();

        $order=new OrderService();
        $status=$order->place($uid,$products);
        return $status;

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/16
 * Time: 9:38
 */

namespace app\api\service;


use app\api\model\OrderProduct;
use app\api\model\Product;
use app\api\model\UserAddress;
use app\lib\exception\OrderException;
use app\lib\exception\UserException;
use think\Exception;

class Order
{
    //客户端传入的下单信息列表
    protected $oProducts;

    //根据客户端传入的下单商品product_id从数据库查询的真实商品信息
    protected $products;

    //下单用户的id
    protected $uid;

    public function place($uid,$oProducts)
    {
        $this->oProducts=$oProducts;
        $this->uid=$uid;
        $this->products=$this->getProductsByOrder($oProducts);
        $status=$this->getOrderStatus();
        if (!$status['pass']){
            $status['order_id']=-1;
            return $status;
        }

        //开始创建订单
        $snapOrder=$this->snapOrder($status);
        $order=$this->createOrder($snapOrder);
        $order['pass']=true;
        return $order;

    }

    //生成订单
    private function createOrder($snap)
    {

        try {
            $orderNo = self::makeOrderNo();
            $order = new \app\api\model\Order();
            $order->user_id = $this->uid;
            $order->order_no = $orderNo;
            $order->total_price = $snap['orderPrice'];
            $order->total_count = $snap['totalCount'];
            $order->snap_name = $snap['snapName'];
            $order->snap_img = $snap['snapImg'];
            $order->snap_address = $snap['snapAddress'];
            $order->snap_items = json_encode($snap['pStatus']);

            $order->save();

//        order_product表新增订单记录
            $orderID = $order->id;
            $create_time = $order->create_time;
            foreach ($this->oProducts as &$p) {
                $p['order_id'] = $orderID;
            }
            $orderProduct = new OrderProduct();
            $orderProduct->saveAll($this->oProducts);
            return [
                'order_no' => $orderNo,
                'order_id' => $orderID,
                'create_time' => $create_time
            ];
        }
        catch (Exception $ex){
            throw $ex;
        }
    }

    //生成订单号
    public static function makeOrderNo()
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn =
            $yCode[intval(date('Y')) - 2018] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        return $orderSn;

    }


    //生成订单快照
    private function snapOrder($status)
    {
        $snap=[
            'orderPrice'=>0,
            'totalCount'=>0,
            'pStatus'=>[],
            'snapAddress'=>null,
            'snapName'=>'',
            'snapImg'=>''
        ];

        $snap['orderPrice']=$status['orderPrice'];
        $snap['totalCount']=$status['totalCount'];
        $snap['pStatus']=$status['pStatusArray'];
        $snap['snapAddress']=json_encode($this->getUserAddress());
        $snap['snapName']=$this->products[0]['name'];
        $snap['snapImg']=$this->products[0]['main_img_url'];

        if (count($this->products)>1){
            $snap['snapName'].='等';
        }
        return $snap;

    }

    //获取用户地址
    private function getUserAddress()
    {
        $userAddress=UserAddress::where('user_id','=',$this->uid)->find();
        if (!$userAddress){
            throw new UserException([
                'msg'=>'用户收获地址不存在，下单失败',
                'errorCode'=>60001
            ]);
        }
        return $userAddress->toArray();
    }




    //验证商品是否有库存，下单是否通过
    private function getOrderStatus()
    {
        $status=[
            'pass'=>true,
            'orderPrice'=>0,
            'pStatusArray'=>[],
            'totalCount'=>0
        ];
        foreach ($this->oProducts as $oProduct){
            $pStatus=$this->getProductStatus(
                $oProduct['product_id'],$oProduct['count'],$this->products
            );
            if (!$pStatus['haveStock']){
                $status['pass']=false;
            }
            $status['orderPrice']+=$pStatus['totalPrice'];
            $status['totalCount']+=$pStatus['count'];
            array_push($status['pStatusArray'],$pStatus);
        }
        return $status;
    }

    private function getProductStatus($oPID,$oCount,$products)
    {
        $pIndex=-1;
        $pStatus=[
            'id'=>null,
            'haveStock'=>false,
            'count'=>0,
            'name'=>'',
            'totalPrice'=>0
        ];

        for ($i=0;$i<count($products);$i++){
            if ($oPID==$products[$i]['id']){
                $pIndex=$i;
            }
        }

        if ($pIndex==-1){
            throw new OrderException([
                'msg'=>'id为：'.$oPID.'的商品不存在，创建订单失败'
            ]);
        }else{
            $product=$products[$pIndex];
            $pStatus['id']=$product['id'];
            $pStatus['name']=$product['name'];
            $pStatus['count']=$oCount;
            $pStatus['totalPrice']=$product['price']*$oCount;
            if ($product['stock']-$oCount>=0){
                $pStatus['haveStock']=true;
            }
        }
        return $pStatus;
    }



    //查询真实商品的信息
    private function getProductsByOrder($oProducts)
    {
        $oPIDs=[];
        foreach ($oProducts as $item) {
            array_push($oPIDs,$item['product_id']);
        }
//        $products=Product::all($oPIDs);
//            ->visible(['id','name','price','stock','main_img_url'])->toArray();
        $products=collection(Product::all($oPIDs))->visible(['id','name','price','stock','main_img_url'])->toArray();
        return $products;
    }


}
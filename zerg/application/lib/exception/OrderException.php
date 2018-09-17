<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/17
 * Time: 13:00
 */

namespace app\lib\exception;


class OrderException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=404;
    public $msg='订单不存在，请检查商品ID';
    public $errorCode=80000;
}
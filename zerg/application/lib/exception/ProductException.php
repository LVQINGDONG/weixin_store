<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/5
 * Time: 21:00
 */

namespace app\lib\exception;



class ProductException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=404;
    public $msg='请求的指定商品product不存在';
    public $errorCode=20000;
}
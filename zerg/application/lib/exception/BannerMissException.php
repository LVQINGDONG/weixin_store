<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/18
 * Time: 14:45
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=404;
    public $msg='请求的banner信息不存在';
    public $errorCode=40000;
}
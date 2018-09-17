<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/4
 * Time: 20:57
 */

namespace app\lib\exception;


class ThemeMissException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=404;
    public $msg='请求的theme信息不存在';
    public $errorCode=30000;
}
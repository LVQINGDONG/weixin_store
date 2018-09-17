<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/12
 * Time: 20:36
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=404;
    public $msg='用户不存在';
    public $errorCode=60000;
}
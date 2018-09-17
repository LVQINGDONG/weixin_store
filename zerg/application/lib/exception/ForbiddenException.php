<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/14
 * Time: 20:33
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=403;
    public $msg='权限不够，无法访问';
    public $errorCode=10001;
}
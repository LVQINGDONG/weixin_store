<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/11
 * Time: 11:45
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=401;
    public $msg='Token过期或者无效';
    public $errorCode=10001;
}
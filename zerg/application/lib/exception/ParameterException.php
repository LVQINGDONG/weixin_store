<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/19
 * Time: 19:54
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=400;
    public $msg='参数错误';
    public $errorCode=10000;
}
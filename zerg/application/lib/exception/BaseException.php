<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/18
 * Time: 14:45
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
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
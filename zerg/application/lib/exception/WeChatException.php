<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/9
 * Time: 21:51
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=400;
    public $msg='微信服务接口调用失败,可能传入code无效';
    public $errorCode=999;
}
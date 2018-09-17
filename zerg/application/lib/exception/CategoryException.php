<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/6
 * Time: 18:37
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    /**
     * @code 状态码
     * @msg 错误的具体信息
     * @errorCode 自定义的错误码
     */
    public $code=404;
    public $msg='请求的商品分类不存在，请检查参数';
    public $errorCode=50000;
}
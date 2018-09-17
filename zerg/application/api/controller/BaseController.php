<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/15
 * Time: 19:32
 */

namespace app\api\controller;


use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller
{
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }
    protected function checkExclusiveScope()
    {
         TokenService::needExclusiveScope();
    }
}
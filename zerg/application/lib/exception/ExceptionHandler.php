<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/7/18
 * Time: 14:44
 */

namespace app\lib\exception;
//use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;
use Exception;

class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

   public function render(Exception $e)
   {
       if ($e instanceof BaseException){
            $this->code=$e->code;
            $this->msg=$e->msg;
            $this->errorCode=$e->errorCode;
       }
       else{
           //判断是否显示tp5框架默认的错误显示页面内，config配置属性app_debug为true时显示默认页面
           if(config('app_debug')){
               return parent::render($e);
           }
           else{
               $this->code=500;
               $this->msg='服务器内部错误，不想告诉你';
               $this->errorCode=999;
               $this->recordErrorLog($e);
           }

       }
        $request=Request::instance();
       $result=[
           'msg'=>$this->msg,
           'errorCode'=>$this->errorCode,
           'request_url'=>$request->url()
       ];
       return json($result,$this->code);
   }


   //记录错误日志
    private function recordErrorLog(Exception $e){
       Log::init([
           'type'  => 'File',
           // 日志保存目录
           'path'  => LOG_PATH,
           // 日志记录级别
           'level' => ['error'],
       ]);
       Log::record($e->getMessage(),'error');
    }
}
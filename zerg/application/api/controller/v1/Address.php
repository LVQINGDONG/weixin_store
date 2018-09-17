<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/12
 * Time: 19:11
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use app\lib\exception\UserException;
use think\Controller;

class Address extends BaseController
{
    protected $beforeActionList=[
        'checkPrimaryScope'=>['only'=>'createOrUpdateAddress']
    ];


    public function createOrUpdateAddress()
    {
        $validate=new AddressNew();
        $validate->goCheck();

        //第一，通过token获取缓存里的uid

        $uid=TokenService::getCurrentUid();

        //第二，根据uid查询此用户是否存在，不存在抛出异常

        $user=UserModel::get($uid);
        if (!$user){
            throw new UserException();
        }

        //第三，获取用户传过来的地址信息
        $dataArray=$validate->getDataByRule(input('post.'));

        //第四，判断用户是否已经存在地址信息，存在则更新，不存在则插入新纪录
        $userAddress=$user->address;
        if (!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }

        return new SuccessMessage();

    }
}
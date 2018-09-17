<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/9/4
 * Time: 20:22
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule=[
        'ids'=>'require|checkIDs'
    ];
    protected $message=[
        'ids'=>'ids必须是以逗号隔开的多个正整数'
    ];

    public function checkIDs($value)
    {
        $values=explode(',',$value);
        if (empty($values)){
            return false;
        }
        foreach ($values as $id) {
            if (!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}
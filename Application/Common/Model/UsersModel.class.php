<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * 会员信息目录model
 */
class UsersModel extends BaseModel{
    //自动完成
    protected $_auto=array(
		array('password','md5_16',3,'function'),
        array('addtime','now',1,'function'), // 对date字段在新增的时候写入当前时间
    );

    public function addData($data){
        // 对data数据进行验证
        if(!$data=$this->create($data)){
            // 验证不通过返回错误
            return false;
        }else{
            // 验证通过
            $result=$this->add($data);
            return $result;
        }
    }
	
	
}

<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * 关于我们	model
 */
class AboutModel extends BaseModel{

    // 自动完成
    protected $_auto=array(
        array('time','now',1,'function'), // 对date字段在新增的时候写入当前时间
    );

	/**
	 * 删除数据
	 * @param	array	$map	where语句数组形式
	 * @return	boolean			操作是否成功
	 */
	public function deleteData($map){
		$result=$this->where($map)->delete();
		return $result;
	}

    /**
     * 添加
     */
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
	
    /**
     * 修改
     */
    public function editData($map,$data){
        // 对data数据进行验证
        if(!$data=$this->create($data)){
            // 验证不通过返回错误
            return false;
        }else{
            // 验证通过
            $result=$this
                ->where(array($map))
                ->save($data);
            return $result;
        }
    }
	
}

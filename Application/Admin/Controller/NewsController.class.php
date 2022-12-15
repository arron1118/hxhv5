<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class NewsController extends AdminBaseController{

    /**
     * 分类列表
     */
    public function news_list(){
		$menu_name = I('menu_name',0,'intval');
		$type = I('type');
		if($menu_name==0){
			if($type>0){
				$map['type'] = $type;
			}else{
				$map['type'] = array('gt',0);
			}
			if(IS_POST && I('id')){
				$map['news_id'] = idDecode(I('id'));
			}
			$data=getpage(M('news'),$map,'news_id desc',10,'news_id,author,type,show,addtime,title',$url);

			$this->assign($data);
		}else{
			if(IS_POST){
				$post = I('post.');
				$post['show']==true?$data['show']=1:$data['show']=0;
				$post['url']==''?$data['url']='javascript:;':$data['url']=$post['url'];
				$data['menu_name'] = I('menu_name');
				$result = M('index_menu')->where(array('id'=>I('id')))->save($data);
				if($result){
					S('index_menu',null);
					S('home_index_news_'.I('id'),null);
					$array = array(
						'status'=>true,
						'msg'=>'修改成功',
					);
				}else{
					$array = array(
						'status'=>false,
						'msg'=>'修改失败，请稍后再试~',
					);
				}
				$this->ajaxReturn($array);
			}else{
				$one = M('index_menu')->where(array('id'=>$menu_name))->find();
				$this->assign('one',$one);
			}
		}
		
		$assign = array(
			'menu_name'=>$menu_name,
			'type'=>$type,
		);
		$this->assign($assign);
        
        $this->display();
		
    }
	
    /**
     * 添加
     */
    public function news_add(){
		if(IS_POST){
			$data=I('post.');
			$post=I('post.');
			ajax_text($post['title']) ? $this->ajaxReturn('标题不通过的词组有：【'.ajax_text($post['title']).'】') :'';
			ajax_text($post['keywords']) ? $this->ajaxReturn('文章关键字不通过的词组有：【'.ajax_text($post['keywords']).'】') :'';
			ajax_text($post['content']) ? $this->ajaxReturn('内容不通过的词组有：【'.ajax_text($post['content']).'】') :'';
			if($data['type']==0){
				$this->ajaxReturn(0);
			}
			$data['content'] = $_POST['content'];
			$result=D('News')->addData($data);
			if ($result) {
				$this->ajaxReturn('添加成功');
			}else{
				$this->ajaxReturn('添加失败');
			}
		}else{
			$this->display();
		}
    }

    /**
     * 修改
     */
    public function news_edit(){
		if(IS_POST){
			$data=I('post.');
			$map=array(
				'news_id'=>$data['news_id']
				);
			$data['content'] = $_POST['content'];
			$result=D('News')->editData($map,$data);
			if ($result) {
				$this->ajaxReturn('修改成功');
			}else{
				$this->ajaxReturn('修改失败');
			}
		}else{
			$id=I('get.id');
			$one = M('news')->where('news_id=%d',$id)->find();
			$this->assign('one',$one);
			$this->display();
		}
    }
	/**
	 *	预览
	 */
	public function preview(){
		$id=I('get.id');
		$one = M('news')->where('news_id=%d',$id)->find();
		$this->assign('one',$one);
		$this->display();
	}
	
    /**
     * 修改 状态status
     */
    public function edit_news_status(){
		if(IS_POST){
            $data=I('post.');
            // 组合where数组条件
            $id=$data['id'];
            $map=array(
                'news_id'=>$id,
                );
			// 登录状态
			$data['show']=I('status',0,'intval');
            // p($data);die;
			$result=D('News')->editData($map,$data);
            if($result){
                // 操作成功
				$this->ajaxReturn('修改成功');
            }else{
				$this->ajaxReturn('修改失败');
			}
		}
	}
	
    /**
     * 删除单条 或 批量删除
     */
    public function delete(){
        $id=I('post.id');
		if(is_array($id)){
			$map=array(
				'news_id'=>array('in',implode(',',$id)),
				);
			
		}else{
			$map=array(
				'news_id'=>$id
				);
		}
        $result=D('News')->deleteData($map);
        if ($result) {
			if(is_array($id)){
				$this->ajaxReturn('删除成功'.$result.'条');
			}else{
				$this->ajaxReturn('删除成功');
			}
        }else{
			$this->ajaxReturn('删除失败');
        }
    }
}
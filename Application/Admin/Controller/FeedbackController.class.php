<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class FeedbackController extends AdminBaseController{
    public function index(){
		$data=getPage(M('Feedback'),'','id asc',10,'');
        $this->assign($data);
        $this->display();
    }
}
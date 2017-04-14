<?php
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends CommonController {
	//客服列表
	Public function index(){
		$this->data=M('service')->order('id ASC')->select();
		$this->display();
	}
	//添加、修改客服视图
	Public function edit(){
		if($_GET['id']){
			$id = $_GET['id'];
			$this->data=M('service')->find($id);
			$this->display();
		}else{
			$this->display();
		}
	}
	//添加/修改客服表单处理
	Public function serviceHandle(){
		if(!IS_POST) halt('页面不存在');
		if($_GET['id']==''){
			$this->adddata('service',I(),'Service');         //数据添加操作
		}else{
			$data['id'] = $_GET['id'];
			$data['name'] = I('name');
			$data['title'] = I('title');
			$data['servicenum'] = I('servicenum');
			$data['phone'] = I('phone');
			$data['qq'] = I('qq');
			$this->savedata('service',$data,'Service');       //数据修改操作
		}
	}
	//添加企业属性   
	Public function delete(){
		$this->del($_GET['del'],'service','Service');          //数据删除操作
	}
	
}
?>
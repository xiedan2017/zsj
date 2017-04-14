<?php
namespace Admin\Controller;
use Think\Controller;
class FriendslinkController extends CommonController {
	// 属性列表view
	public function index(){
		$data=M('friendslink')->order('sort ASC')->select();
		$this->data=$data;
		$this->display();
	}
	// 属性添加和编辑view
	public function edit(){
		$data=M('friendslink')->order('sort ASC')->find(I('id'));
		$this->data=$data;
		$this->display();
	}
	// 数据添加和编辑数据处理
	public function friendslinkHandle(){
		if(!IS_POST) halt('页面不存在');
		if($_GET['id']==""){
			$this->adddata('friendslink',I('post.'),'Friendslink');              //数据添加操作
		}else{
			$data['id']=$_GET['id']; 
			$data['cnname']=I('cnname');
			$data['enname']=I('enname');
			$data['url']=I('url');
			$data['status']=I('status');
			$data['sort']= I('sort');
			$this->savedata('friendslink',$data,'Friendslink');       //数据修改操作
		}
	}
    // 数据删除处理     
	public function delete(){
		$this->del($_GET['del'],'friendslink','Friendslink');         //数据删除操作
	}
	public function sort(){
		$this->sortAsc('friendslink');
	} 
}
?>
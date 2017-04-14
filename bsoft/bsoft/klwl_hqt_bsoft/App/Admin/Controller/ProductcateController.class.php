<?php
namespace Admin\Controller;
use Think\Controller;
class ProductcateController extends CommonController {
	// 属性列表view
	public function index(){
		$data=M('productcate')->order('sort ASC')->select();
		$this->data=$data;
		$this->display();
	}
	// 属性添加和编辑view
	public function edit(){
		$data=M('productcate')->order('sort ASC')->find(I('id'));
		$this->data=$data;
		$this->display();
	}
	// 数据添加和编辑数据处理
	public function productcateHandle(){
		if(!IS_POST) halt('页面不存在');
		if($_GET['id']==""){
			$arr = I('post.');
			$arr['time'] = time();
			$this->adddata('productcate',$arr,'Productcate');              //数据添加操作
		}else{
			$data['id']=$_GET['id']; 
         	$data['name']=I('name');
			$data['time']=time();
			$data['status']=I('status');
			$data['red']=I('red');
			$data['pic']=I('post.pic');
			$data['sort']= I('sort');
			$this->savedata('productcate',$data,'Productcate');       //数据修改操作
		}
    }
    public function uploadImage(){
		$this->uploadsImages("product");
	}
	public function delpic(){
		unlink($_POST['path']);
	}
    // 数据删除处理     
	public function delete(){
		$this->del($_GET['del'],'productcate','Productcate');         //数据删除操作
    }  
    public function sort(){
		$this->sortAsc('productcate');
	}
}
?>
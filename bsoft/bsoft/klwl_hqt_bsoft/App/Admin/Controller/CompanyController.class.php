<?php
namespace Admin\Controller;
use Think\Controller;
class CompanyController extends CommonController {
	// 属性列表view
	public function index(){
		$data=M('Company')->order('sort ASC')->select();
		$this->data=$data;
		$this->display();
	}
	// 属性添加和编辑view
	public function edit(){
		$data=M('company')->order('sort ASC')->find(I('id'));
		$this->data=$data;
		$this->display();
	}
	// 数据添加和编辑数据处理
	public function companyHandle(){
		if($_GET['id']==""){
			$this->adddata('company',I(),'Company');              //数据添加操作
		}else{
			$data['id']=$_GET['id']; 
         	$data['attr']=I('attr');
			$data['value']=I('value');
			$data['status']=I('status');
			$data['sort']= I('sort');
			$this->savedata('company',$data,'Company');       //数据修改操作
		}
    }
    // 数据删除处理     
	public function delete(){
		$this->del($_GET['del'],'company','Company');         //数据删除操作
    }
	  
}
?>
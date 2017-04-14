<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends CommonController {
	// 案例列表view
	public function index(){
		$pagedata = $this->Page('product',C('page'));  //$table为分页表名，$num分页显示数据返回limit值和分页样式
		$this->page=$pagedata['page'];
		$this->data=D('ProductRelation')->relation(true)->limit($pagedata['limit'])->select();
		$this->display();
	}
	// 添加和编辑案例view
	public function edit(){
		$data=D('ProductRelation')->relation(true)->limit($pagedata['limit'])->find(I('id'));
		$this->data=D('ProductRelation')->relation(true)->limit($pagedata['limit'])->find(I('id'));
	
		$this->productcate = M('productcate')->where(array('status'=>0))->select();
		$this->display();
	}
	// 数据添加和编辑数据处理
	public function productHandle(){
		if(!IS_POST) halt('页面不存在');
		if($_GET['id']==""){
			$data = array();
			$data = I('post.');
			$data['content']= I('post.content','','htmlspecialchars_decode');
			$data['time'] = time();
			if($id = M('product')->add($data)){
				if(isset($_POST['lid'])){
					foreach ($_POST['lid'] as $v) {
					 	$libdate = array('pid'=>$id,'lid'=>$v);
					    M('product_label')->add($libdate);
					 }
				}
				$this->success('添加成功！！！',U(MODULE_NAME.'/Product/index'));
			}else{
				$this->error('添加失败！！！');
			}
		}else{
			$data = array();
			$data['id']=$_GET['id']; 
			$data['name']=I('post.name');
			$data['title']=I('post.title');
			$data['time']=time();
			$data['cate']=I('post.cate','','intval');
			$data['status']=I('post.status','','intval');
			$data['red']=I('post.red','','intval');
			$data['sort']= I('post.sort');
			$data['content']= I('post.content','','htmlspecialchars_decode');
			if(M('product')->save($data)){
				if(isset($_POST['lid'])){ 
				   //删除原始标签
					M('product_label')->where(array('pid'=>$_GET['id']))->delete();
					foreach ($_POST['lid'] as $v) {
					 	$libdate = array('pid'=>$_GET['id'],'lid'=>$v);
					    M('product_label')->add($libdate);
					 }
				}
				$this->success('保存成功！！！',U(MODULE_NAME.'/Product/index'));
			}else{
				$this->error('保存失败！！！');
			}
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
		$table = M('product')->find($_GET['id']);
		unlink ($table['pic']); 
		$this->del($_GET['del'],'product','Product');         //数据删除操作
	}
	//批量删除
	public function deleteall(){
		$this->delall('product',I('post.'));
	}
}
?>
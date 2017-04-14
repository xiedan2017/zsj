<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends CommonController {
	// 案例列表view
	public function index(){
		$pagedata = $this->Page('news',C('page'));  //$table为分页表名，$num分页显示数据返回limit值和分页样式
		$this->page=$pagedata['page'];
		$this->data=D('NewsRelation')->relation(true)->limit($pagedata['limit'])->select();
		$this->display();
	}
	// 添加和编辑案例view
	public function edit(){
		$data=D('NewsRelation')->relation(true)->limit($pagedata['limit'])->find(I('id'));
		$this->data=D('NewsRelation')->relation(true)->limit($pagedata['limit'])->find(I('id'));
		$this->product = M('product')->where(array('status'=>0,'name'=>'新闻中心'))->select();
		$this->display();
	}
	// 数据添加和编辑数据处理
	public function newsHandle(){
		if(!IS_POST) halt('页面不存在');
		if($_GET['id']==""){
			$data = array();
			$data = I('post.');
			$data['time'] = time();
			if($id = M('news')->add($data)){
				$this->success('添加成功！！！',U(MODULE_NAME.'/News/index'));
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
			if(M('news')->save($data)){
				$this->success('保存成功！！！',U(MODULE_NAME.'/News/index'));
			}else{
				$this->error('保存失败！！！');
			}
		}
	}
	public function uploadImage(){
		$this->uploadsImages("news");
	}
	public function delpic(){
		unlink($_POST['path']);
	}
    // 数据删除处理     
	public function delete(){
		$table = M('news')->find($_GET['id']);
		unlink ($table['pic']); 
		$this->del($_GET['del'],'news','News');         //数据删除操作
	}
	//批量删除
	public function deleteall(){
		$this->delall('news',I('post.'));
	}
}
?>
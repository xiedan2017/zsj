<?php
namespace Admin\Controller;
use Think\Controller;
class MessagesController extends CommonController {
	public function index(){
		$pagedata = $this->Page('messages',C('page'));  //$table为分页表名，$num分页显示数据返回limit值和分页样式
		$this->page=$pagedata['page'];
		$this->data = M('messages')->order('id ASC')->limit($pagedata['limit'])->select();
		$this->display();
	}
	public function search(){
		$this->data = M('messages')->find(I('get.id'));
		$this->display();
	}
	public function copy(){
		$this->data = M('messages')->find(I('get.id'));
		$this->display();
	}
	public function copyHandle(){
		if(!IS_POST) halt('页面不存在');
		$data = I('post.');
		$data['copytime'] = time();
		$data['admin'] = $_SESSION['username'];
		$rs = $this->sendMail(I('post.email'),I('post.copytitle'),I('post.copyContent'));
		if($rs==1){
			$data['status'] = 0;
			if(M('messages')->where(array('id'=>$_GET['id']))->save($data)){
				$this->success('回复成功！！！',U(MODULE_NAME.'/Messages/index'));
			}else{
				$this->error('回复失败！！！');
			}
		}else{
			$data['status'] = 1;
			if(M('messages')->where(array('id'=>$_GET['id']))->save($data)){
				$this->success('回复失败！！！',U(MODULE_NAME.'/Messages/index'));
			}else{
				$this->error('回复和修改失败！！！');
			}
		}

	}
	Public function ignore(){
		if(!IS_POST) halt('页面不存在');
		M('messages')->where(array('id'=>$_POST['id']))->setField('status',0);
		echo 1;
	}
	public function delete(){
		$this->del(I('get.del'),'messages','Messages');
	}
	//批量删除
	public function deleteall(){
		if(!IS_POST) halt('页面不存在');
		$this->delall('messages',I('post.'));
	}
}
?>
<?php
namespace Admin\Controller;
use Think\Controller;
class SendEmailController extends CommonController {
	public function index(){
		$this->emailconfig = S('emailconfig');
		$this->data=M('sendemail')->select();
		$this->display();
	}
	public function emailConfig(){
		S('emailconfig',I('post.'),3600*24*100);
		echo 1;
	}
	public function edit(){
		$this->data=M('sendemail')->find(I('get.id'));
		$this->display();
	}
	public function SendEmailHandle(){
		if(!IS_POST) halt('页面不存在');
		$data = I('post.');
		$data['time'] = time();
		$data['admin'] = $_SESSION['username'];
		$rs = $this->sendMail(I('post.send'),I('post.title'),I('post.content'));
		if($rs==1){
			$data['status'] = 0;
			$data['admin'] = session('username');
			if(M('sendemail')->add($data)){
				$this->success('发送成功！！！',U(MODULE_NAME.'/SendEmail/index'));
			}
		}else{
			$data['status'] = 1;
			$data['admin'] = session('username');
		    M('sendemail')->add($data);
			$this->error('发送失败');
		}	
	}
	public function delete() {
		$this->del(I('get.del'),'sendemail','SendEmail');
	}
	public function search(){
		$this->data = M('sendemail')->find($_GET['id']);
		$this->display();
	}
}
?>
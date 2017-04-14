<?php
namespace Admin\Controller;
use Think\Controller;
Class LoginController extends Controller{
	//login模板
	Public function index(){
		$this->company = C('company');
		$this->companyurl = C('companyurl');
		$this->display();
	}
	Public function code(){
		import('Class.Vcode',APP_PATH,'.php');
		$config = array("width" => 140, "height" => 48, "count" => 4, "str" => 2); //配置
        $vcode =new \Vcode($config);
        $vcode->getCode();                            //获取验证码
        $vcode->getImg();                             //输出图片
	}
	//登录表单处理
	Public function login(){
		$this->company = C('company');
		if(!IS_POST) halt('页面不存在');
		$name = I('name');
		$pwd = I('password','','md5');
		$user = M('admin')->where(array('name' =>$name))->find();
		if(session('code') != I('post.code','','strtolower')){
			$this->error('请输入正确的验证码');
		}elseif(!$user || $user['password'] != $pwd){
			$this->error('账号或密码错误');
		}elseif($user['lock']==1){
			$this->error('用户被锁定');
		}else{
			$data = array(
				'id' => $user['id'],
				'logintime' => date('Y-m-d H:i:s'),
				'loginip' => get_client_ip(),
				'ipaddress'=>getIpApi(get_client_ip()),
				);
			if(M('admin')->save($data)){
				session('username',$user['name']);
				$this->redirect(MODULE_NAME.'/Index/index');
			}
		}
	}
}
?>
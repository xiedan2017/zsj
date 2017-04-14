<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends CommonController {
	//首页展示
	public function index() {
	   //读取主菜单以及二级菜单
	   $menu = $this->GetMenu();
	   // dump($menu);die;
	   $this->menu = $menu;
	   //首页新闻列表展示
	   $news = M('news')->order('id DESC')->where(array('status'=>0))->limit(3)->select();
	   // dump($news);die;
	   $this->news = $news;
	   //服务范围
	   $this->service = M('product')->where(array('name'=>'服务范围'))->find();
	   //加入我们
	   $this->job = M('product')->where(array('name'=>'职业发展'))->find();
	   $this->display();
	}
}
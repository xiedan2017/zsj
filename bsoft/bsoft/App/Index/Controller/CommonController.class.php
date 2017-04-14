<?php
namespace Index\Controller;
use Think\Controller;
Class CommonController extends Controller{
	//自动运行方法判断权限和是否登录
	Public function _initialize(){
		$this->url = C('url');
	}
	Public function GetMenu(){
		//读取主菜单以及二级菜单
		$menu = D('CateRelation')->order('sort asc')->relation(true)->limit(4)->where(array('status'=>0))->select();
		// dump($menu);die;
		return $menu;
	}
	//$table为分页表名，$num分页显示数据,返回limit值和page
	public function Page($table,$num,$where){
		$count= M($table)->where($where)->count();
		$page= new \Think\Page($count,$num);
		$limit = $page->firstRow . ','. $page->listRows;
		$page=$page->show();
		$arr = array();
		$arr['limit'] = $limit;
		$arr['page'] = $page;
		return $arr;
	}
}
?>
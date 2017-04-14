<?php
namespace Index\Controller;
use Think\Controller;
class NewsController extends CommonController {
    public function index(){
        //读取主菜单以及二级菜单
        $menu = $this->GetMenu();
        $this->menu = $menu;
        $cate = $_GET['cate'];
        //读取分类图片
        $this->productcate = M('productcate')->field('pic')->where(array('id'=>$cate))->find();
         //读取左边所属二级菜单
        $newscate = M('product')->field('cate')->where(array('id'=>$cate))->find();
        $this->leftmenu = M('product')->where(array('cate'=>$newscate['cate']))->select();
        // 读取新闻列表
        $pagedata = $this->Page('news',C('page'),array('status'=>0));
        $this->page = $pagedata['page'];
        $this->newslist = M('news')->order('sort asc')->where(array('status'=>0))->limit($pagedata['limit'])->select();
         //筛选推荐
        $this->red = M('product')->order('sort asc')->where(array('red'=>1))->limit(2)->select();
        $this->display();    
    }
    public function details(){
        //读取主菜单以及二级菜单
        $menu = $this->GetMenu();
        $this->menu = $menu;
        $newsid = $_GET['newsid'];
        $news = M('news')->where(array('id'=>$newsid))->find();
        $newscate = M('product')->field('cate')->where(array('id'=>$news['cate']))->find();
        $this->leftmenu = M('product')->where(array('cate'=>$newscate['cate']))->select();
        $this->details = $news;
         //筛选推荐
        $this->red = M('product')->order('sort asc')->where(array('red'=>1))->limit(2)->select();
        $this->display();    
    }
}
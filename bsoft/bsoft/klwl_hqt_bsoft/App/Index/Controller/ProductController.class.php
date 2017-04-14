<?php
    namespace Index\Controller;
    use Think\Controller;
    class ProductController extends CommonController {
    public function detail(){
        //读取主菜单以及二级菜单
        $menu = $this->GetMenu();
        $this->menu = $menu;
        $cate = $_GET['cate'];
        $pid = $_GET['pid'];
        $this->productcate = M('productcate')->field('pic')->where(array('id'=>$cate))->find();
         //读取左边所属二级菜单
        $this->leftmenu = M('product')->where(array('cate'=>$cate))->select();
        $this->detail = M('product')->order('sort asc')->where(array('cate'=>$cate,'id'=>$pid))->find();
        //筛选推荐
        $this->red = M('product')->order('sort asc')->where(array('red'=>1))->limit(2)->select();
        $this->pid=$pid;
        $this->display();    
    }
}
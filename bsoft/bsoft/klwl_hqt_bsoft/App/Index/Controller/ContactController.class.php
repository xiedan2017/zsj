<?php
    namespace Index\Controller;
    use Think\Controller;
    class ContactController extends CommonController {
    public function index(){
        //读取主菜单以及二级菜单
        $menu = $this->GetMenu();
        $this->menu = $menu;
        $this->display();    
    }
    public function msgHandle(){
    	$data = array();
    	$data = $_POST;
    	$data['time'] = time();
    	if(M('messages')->add($data)){
    		$this->success('留言成功！！！');
    	}else{
    		$this->error('留言失败！！！');
    	}
    }
}
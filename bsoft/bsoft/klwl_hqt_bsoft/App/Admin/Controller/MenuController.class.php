<?php
namespace Admin\Controller;
use Think\Controller;
class MenuController extends CommonController {
	public function index(){
		import('Class.Category',APP_PATH);
		$menu=M('menu')->order('sort ASC')->select();		
		$this->menu=\Category::unlimitedForLevel($menu,'&nbsp;&nbsp;&nbsp;---');
		$this->display();
	}
	//添加分类
	public function edit(){
		$menu=M('menu')->where(array('id'=>I('get.upid')))->find();
		// dump($menu);
		// die;
		$this->menu=$menu;
		$pid = isset($_GET['id']) ? $_GET['id'] : 0;
		$this->pid=$pid;
		$this->display();
	}
	// 属性数据的添加和修改
	public function saveOrUpdate(){
		if(!IS_POST) halt('页面不存在');
		$upid=isset($_GET['upid']) ? $_GET['upid'] : 0;
		if($upid){
			$menu=M('menu');
			if($_FILES["pic"]['name']) {
				$table = M('menu')->find($_GET['id']);
				unlink ($table['pic']);                                    //删除原图片
				$info = $this->uploads('menuico');                         //上传图片返回图片信息给$info变量
				$data['pic'] = $info[0]['savepath'].$info[0]['savename'];
			}
			// 所要修改数据的字段=val
         	$data['id']=$upid; 
			$data['name']=$_POST["name"];
			$data['controller']=$_POST["controller"];
			$data['methods']=$_POST["methods"];
			$data['sort']=$_POST["sort"];
			$data['status']=$_POST["status"];
			if($menu->save($data)!==false){
	   		   $this->success('修改成功',U(MODULE_NAME.'/Menu/index'));
	     	}else{
	   		   $this->error('修改失败');
	   	   }
		}else{
			$data = I('post.');
			if($_FILES["pic"]) {
				$info = $this->uploads('menuico');                            //上传图片返回图片信息给$info变量
				$data['pic'] = $info[0]['savepath'].$info[0]['savename'];
			}
			// 属性数据添加
			if(M('menu')->add($data)){
		   		$this->success('添加成功',U(MODULE_NAME.'/Menu/index'));
		   	}else{
		   		$this->error('添加失败');
		   	}
		}
	}
	//删除操作与多项删除
	public function del(){
		if(M('menu')->delete($_GET['id'])){
   		    $this->success('删除成功',U(MODULE_NAME.'/Menu/index'));
        }else{
   		    $this->error('删除失败');
	   	 }
	}

	//添加排序
	public function sortmenu(){
		$db = M('menu');
		foreach($_POST as $id => $sort){
			$db->where(array('id'=>$id))->setField('sort',$sort);
		}
		$this->success('排序成功');
	}
	//批量删除
	public function deleteall(){
		$this->delall('product',I('post.'));
	}

}
?>		
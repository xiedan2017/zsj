<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	//后台首页
	Public function index(){
		$this->msg = M('messages')->where('status=1')->count();
		$data['username'] = $_SESSION['username'];
		$data['superadmin'] = $_SESSION['superadmin'];
		$this->data=$data;
		import('Class.Category',APP_PATH);
		$menu=M('menu')->order('sort ASC')->select();		
		$this->menu=\Category::unlimitedForLayer($menu,'child');
		$this->display();
	}
	Public function welcome(){
		$date=M('admin')->where($_SESSION['uid'])->find();
		// 给模板分配LOG变量
		$logo=M('logo')->find();
		$this->logo=$logo;
		$this->msg=$date;
		$this->display();
	}
	//退出登录
	Public function logout(){
		session_unset();
		session_destroy();
		$this->redirect(MODULE_NAME.'/Login/index');
	}
	//设置网站LOGO
	Public function setlogo(){
		 $info = $this->uploads('logo');                            //上传图片返回图片信息给$info变量
		 $data['id'] = 1;
		 $data['pic'] = $info[0]['savepath'].$info[0]['savename'];
		 $data['time'] = date('Y-m-d H:i:s');
		 $num=M('logo')->save($data);
		 if ($num) {
		 	$this->success('设置成功！！！');
		 }else{
		 	$this->error('设置失败！！！');
		 }
		}
	public function clear(){
		$Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
		$table = $Model->query('show tables');
		foreach($table as $k => $v){
			
		   $Model->query('optimize table '.$v['tables_in_bsoft']);
		}
		$this->success('数据库碎片清除成功');
	}
}
?>
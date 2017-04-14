<?php
namespace Admin\Controller;
use Think\Controller;
class RbacController extends CommonController {
	//用户列表
	Public function index(){
		$this->admin=D('AdminRelation')->relation(true)->field('password',true)->select();
		$this->display();
	}
	//用户删除
	Public function delete(){
		if(M('admin')->delete(I('del'))){
			$this->success('删除成功！！！');
		}else{
			$this->error('删除失败！！！');
		}
	}
	//开启和锁定用户
	Public function lock(){
		$uid = I('get.pid');
		$data = M('admin')->field('lock')->find($uid);
		if($data['lock'] == 1){
			if(M('admin')->where(array('id'=>$uid))->setField('lock','0')){
				$this->success('开启成功！！！');
			}else{
				$this->error('开启失败！！！');
			}
		}else{
			if(M('admin')->where(array('id'=>$uid))->setField('lock','1')){
				$this->success('锁定成功！！！');
			}else{
				$this->error('锁定失败！！！');
			}
		}
	}
	//用户解除锁定
	Public function unlock(){
		$data['id'] = I('pid');
		$data['lock'] = 0;
		if(M('admin')->save($data)){
			$this->success('开启成功！！！');
		}else{
			$this->error('开启失败！！！');
		}
	}

	//角色列表
	Public function role(){
		$this->role = M('role')->select();
		$this->display();
	}
	//节点列表
	Public function node(){
		$field = array('id','name','title','pid');
		$node = M('node')->field($field)->order('sort')->select();
		$this->node = node_merge($node);
		$this->display();
	}
	//添加用户
	Public function addUser(){

		$this->role=M('role')->select();
		$this->display();
	}
	//添加用户表单处理
	Public function addUserHandle(){
		$admin=array(
			'name'=>I('post.name'),
			'password'=>I('post.password','','md5'),
			'logintime'=>date('Y-m-d H:i:s'),
			'loginip'=>get_client_ip()
		);
		// dump($admin);die;
		$role = array(); dump($role);die;
		if($uid=M('admin')->add($admin)){
			foreach($_POST['role_id'] as $v){
				$role[] = array(
					'role_id'=>$v,
					'user_id'=>$uid
					);
			}
			M('role_user')->addAll($role);
			$this->success('添加成功',U(MODULE_NAME.'/Rbac/index'));
		}else{
			$this->error('添加失败！！！');
		}
	}
	//添加角色
	Public function addRole(){
		$this->display();
	}
	//添加角色表单处理
	Public function addRoleHandle(){
		if(M('role')->add($_POST)){
			$this->success('添加成功！！！',U(MODULE_NAME.'/Rbac/role'));
		}else{
			$this->error('添加失败！！！');
		}
	}
	//删除角色表单处理
	Public function delRole(){
		if(M('role')->delete(I('del'))){
			$this->success('删除成功！！！',U(MODULE_NAME.'/Rbac/role'));
		}else{
			$this->error('删除失败！！！');
		}
	}
	//配置权限
	Public function access(){
		$rid=I('rid',0,'intval');
		$field = array('id','name','title','pid');
		$node = M('node')->order('sort')->field($field)->select();
		//原有权限
		$access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
		$this->node = node_merge($node,$access);
		// dump($node);
		// die;
		$this->rid = $rid;
		$this->display();
	}
	//配置权限表单处理
	Public function setAccess(){
		$rid = I('rid', 0 ,'intval');
		$db = M('access');
		$db->where(array('role_id' =>$rid))->delete();
		$data = array();
		foreach ($_POST['access'] as $v) {
			$tmp = explode('_', $v);
			$data[]=array(
				'role_id'=>$rid,
				'node_id'=>$tmp[0],
				'level'=>$tmp[1]
				);
		}
		if($db->addAll($data)){
			$this->success("修改成功！！！",U(MODULE_NAME.'/Rbac/role'));
		}else{
			$this->error('修改失败！！！');
		}
	}
	//添加节点
	Public function addNode(){
		$this->pid = I('pid',0,'intval');
		$this->level = I('level',1,'intval');
		switch ($this->level){
			case 1:
			$this->type = '应用';
			break;
			case 2:
			$this->type = '控制器';
			break;
			case 3:
			$this->type = '动作方法';
			break;
		}
		$this->display();
	}
	//删除节点
	Public function delNode(){
		if(M('node')->delete(I('pid'))){
			$this->success('删除成功！！！');
		}else{
			$this->error('删除失败！！！');
		}
	}
	//添加节点表单出来
	Public function addNodeHandle(){
		if(M('node')->add($_POST)){
			$this->success('添加成功！！！',U(MODULE_NAME.'/Rbac/node'));
		}else{
			$this->error('添加失败！！！');
		}
	}
}
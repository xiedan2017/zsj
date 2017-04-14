<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/klwl_hqt_bsoft/APP/Admin/View/Public/Css/common/style.css" />
	<script type="text/javascript" src="/klwl_hqt_bsoft/APP/Admin/View/Public/Js/common/jquery.min.js"></script>
	<script type="text/javascript" src="/klwl_hqt_bsoft/APP/Admin/View/Public/Js/js.js"></script>
</head>
<body>
<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="#">RBAC权限管理</a></li>
		<li><a href="#">角色管理</a></li>
	</ul>
</div>
<div class="rightinfo">  
	<div class="tools">
		<ul class="seachform"> 
			<li><label>综合查询</label><input name="key" type="text" class="scinput"style="width:200px;"/></li>
			<li><label>&nbsp;</label><input type="button" class="scbtn" value="查询" onclick="Search()"/></li>
			<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Rbac/addRole');?>" class="toolbar"><span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t01.png" /></span>添加</li>          
		</ul>
	</div>    
</div>
<table class="tablelist">
	<tr>
		<th width="2%">&nbsp;</th>
		<th width="5%">ID</th>
		<th width="10%">角色名称</th>
		<th width="10%">角色描述</th>
		<th width="10%">开启状态</th>
		<th>操作</th>
	</tr>
	<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
			<td></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			<td><?php echo ($v["remark"]); ?></td>
			<td>
				<?php if($v['status']): ?>开启<?php else: ?>关闭<?php endif; ?>
			</td>
			<td class="caozuo">
				<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Rbac/access',array('rid'=>$v['id']));?>" style="width:88px"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/peizhi.jpg"/>配置权限</li>
				<li onclick="del(this)" src="<?php echo U(MODULE_NAME.'/Rbac/delRole',array('del'=>$v['id']));?>"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/close1.png"/>删除</li>
			</td>
		</tr><?php endforeach; endif; ?>   
</table>
<div class="tip">
	<div class="tiptop"><span>提示信息</span><a></a></div>
	<div class="tipinfo">
		<span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/ticon.png" /></span>
		<div class="tipright">
			<p>是否确认对该信息删除吗 ？</p>
			<cite>如果是请点击确定按钮 ，否则请点取消。</cite>
		</div>
	</div>
	<div class="tipbtn">
		<input type="button"  class="sure" value="确定删除" />&nbsp;
		<input type="button"  class="cancel" value="取消" />
	</div>
</div>
</body>
</html>
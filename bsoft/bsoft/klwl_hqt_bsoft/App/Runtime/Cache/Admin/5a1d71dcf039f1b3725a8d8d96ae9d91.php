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
		<li><a href="#">栏目管理</a></li>
		<li><a href="#">菜单管理</a></li>
	</ul>
</div>
<div class="rightinfo">
	<div class="tools">
		<ul class="seachform">   
			<li><label>综合查询</label><input name="key" type="text" class="scinput"  value="<?php echo ($key); ?>" style="width:200px;"/></li>
			<li><label>&nbsp;</label><input type="button" class="scbtn" value="查询" onclick="Search()"/></li>
			<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Menu/edit');?>" class="toolbar"><span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t01.png" /></span>添加</li>
			<li class="toolbar"  onclick="Delete()"><span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t03.png" /></span>删除</li>		            
		</ul>
	</div>    
</div>
<form action="<?php echo U(MODULE_NAME.'/Menu/deleteall');?>" name="form1" method="post">
	<table class="tablelist">   
		<tr>
			<th width="4%">&nbsp;</th>
			<th width="5%">ID</th>
			<th width="10%">菜单名称</th>
			<th width="10%">控制器名称</th>
			<th width="10%">方法名称</th>
			<th width="4%">级别</th>
			<th width="10%">排序</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($menu)): foreach($menu as $key=>$v): ?><tr>
				<td><input type="checkbox" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["id"]); ?>" /></td>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["html"]); echo ($v["name"]); ?></td>
				<td><?php echo ($v["controller"]); ?></td>
				<td><?php echo ($v["methods"]); ?></td>
				<td><?php echo ($v["level"]); ?></td>
				<td><?php echo ($v["sort"]); ?></td>
				<td class="caozuo">
					<?php if($v['level'] == 1): ?><li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Menu/edit',array('id'=>$v['id']));?>" style="width: 96px"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t01.png" />添加子菜单</li><?php endif; ?>
					<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Menu/edit',array('upid'=>$v['id']));?>"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t02.png"/>修改</li>
					<li onclick="del(this)" src="<?php echo U(MODULE_NAME.'/Menu/del',array('id'=>$v['id']));?>"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/close1.png"/>删除</li>
				</td>
			</tr><?php endforeach; endif; ?>
		<tr style="height: 60px">
			<td colspan="3">
				<input type="button" value="全选" id="selectAll" class="btn btnselect"/>
				<input type="button" value="不选" id= "unSelect" class="btn btnselect"/>
				<input type="button" value="反选" id="reverse" class="btn btnselect"/>
			</td>
			<td colspan="4" align="center"><?php echo ($page); ?></td>
			<td align="right"><input type="submit" value="批量删除" class="btn del" style="float: right;margin-right: 20px;" /></td>
		</tr> 			   
	</table> 
</form> 	
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
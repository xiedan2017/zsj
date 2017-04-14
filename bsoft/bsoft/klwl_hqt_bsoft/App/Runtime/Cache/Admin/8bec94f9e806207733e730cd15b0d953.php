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
		<li><a href="#">企业管理</a></li>
		<li><a href="#">友情链接管理</a></li>
	</ul>
</div>
<div class="rightinfo">  
	<div class="tools">
		<ul class="seachform">
			<li><label>综合查询</label><input name="key" type="text" class="scinput"style="width:200px;"/></li>
			<li><label>&nbsp;</label><input type="button" class="scbtn" value="查询" onclick="Search()"/></li>
			<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Friendslink/edit');?>" class="toolbar"><span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t01.png" /></span>添加</li> 	            
		</ul>
	</div>    
</div>
<form action="<?php echo U(MODULE_NAME.'/Friendslink/sort');?>" method="post">
	<table class="tablelist">
		<tr>
			<th width="2%">&nbsp;</th>
			<th width="5%">序 号</th>
			<th width="10%">中文链接名称</th>
			<th width="10%">英文链接名称</th>
			<th width="15%">链接地址</th>
			<th width="8%">是否显示</th>
			<th width="10%">排 序</th>
			<th>操 作</th>
		</tr>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td></td>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["cnname"]); ?></td>
				<td><?php echo ($v["enname"]); ?></td>
				<td><a href="<?php echo ($v["url"]); ?>" target="_blank"><?php echo ($v["url"]); ?></a></td>
				<?php if($v['status']==0): ?><td class="green">显 示</td>
					<?php else: ?>
					<td class="red">隐 藏</td><?php endif; ?>
				<td><input type="text" name ="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>" class="sort"></td>
				<td class="caozuo">
					<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Friendslink/edit',array('id'=>$v['id']));?>"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t02.png"/>修改</li>
					<li onclick="del(this)" src="<?php echo U(MODULE_NAME.'/Friendslink/delete',array('del'=>$v['id']));?>"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/close1.png"/>删除</li>
				</td>
			</tr><?php endforeach; endif; ?> 
		<tr style="height: 65px">
			<td colspan ="8" align="center"><input type="submit" class="btn" value="排序" /></td>
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
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/bsoft/APP/Admin/View/Public/Css/common/style.css" />
	<script type="text/javascript" src="/bsoft/APP/Admin/View/Public/Js/common/jquery.min.js"></script>
	<script type="text/javascript" src="/bsoft/APP/Admin/View/Public/Js/js.js"></script>
</head>
<body>
<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="#">栏目管理</a></li>
		<li><a href="#">客服管理</a></li>
	</ul>
</div>
<div class="rightinfo">  
	<div class="tools">
		<ul class="seachform">
			<li><label>综合查询</label><input name="key" type="text" class="scinput"style="width:200px;"/></li>
			<li><label>&nbsp;</label><input type="button" class="scbtn" value="查询" onclick="Search()"/></li>
			<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Service/edit');?>" class="toolbar"><span><img src="/bsoft/APP/Admin/View/Public/Images/t01.png" /></span>添加</li>	            
		</ul>
	</div>    
</div>
<table class="tablelist">
	<tr>
		<th width="2%">&nbsp;</th>
		<th width="5%">序 号</th>
		<th width="10%">客服姓名</th>
		<th width="10%">客服QQ号</th>
		<th width="15%">客服描述</th>
		<th width="10%">客服服务号</th>
		<th width="15%">客服联系方式</th>
		<th>操 作</th>
	</tr>
	<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
			<td></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			<td><?php echo ($v["qq"]); ?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td><?php echo ($v["servicenum"]); ?></td>
			<td><?php echo ($v["phone"]); ?></td>
			<td class="caozuo">
				<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Service/edit',array('id'=>$v['id']));?>"><img src="/bsoft/APP/Admin/View/Public/Images/t02.png"/>修改</li>
				<li onclick="del(this)" src="<?php echo U(MODULE_NAME.'/Service/delete',array('del'=>$v['id']));?>"><img src="/bsoft/APP/Admin/View/Public/Images/close1.png"/>删除</li>
			</td>
		</tr><?php endforeach; endif; ?> 
</table>
<div class="tip">
	<div class="tiptop"><span>提示信息</span><a></a></div>
	<div class="tipinfo">
		<span><img src="/bsoft/APP/Admin/View/Public/Images/ticon.png" /></span>
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
</form>
</body>
</html>
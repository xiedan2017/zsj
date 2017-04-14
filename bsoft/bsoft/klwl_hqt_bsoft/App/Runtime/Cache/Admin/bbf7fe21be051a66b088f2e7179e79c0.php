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
<style type="text/css">
	.tdleft{text-align: left; }
	.tdright{text-align: right; width:85px}
	.editor {
		padding: 5px 5px 15px 20px;
	}
	.forminfo li span{
		width: 500px;
		line-height: 34px;
		display: block;
		float: left;
	}
	.forminfo li div{
		width: 500px;
		line-height: 34px;
		display: block;
		float: left;
	}
</style>
<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="#">内容管理</a></li>
		<li><a href="#">留言管理</a></li>
		<li><a href="#"><?php echo ($data["name"]); ?>的留言详情</a></li>
		<li><a href="javascript:history.back();" >返回</a></li>
	</ul>
</div>
<div class="formbody">
	<ul class="forminfo">
		<li><h3 style="font-size:16px"><?php echo ($data["name"]); ?>的留言详情</h3></li>
		<li><label>留言人姓名：</label><span><?php echo ($data["name"]); ?></span></li>
		<li><label>留言人时间：</label><span><?php echo (date('Y-m-d h:i:s',$data["time"])); ?></span></li>
		<li><label>联系人电话：</label><span><?php echo ($data["phone"]); ?></span></li>
		<li><label>联系人邮箱：</label><span><?php echo ($data["email"]); ?></span></li>
		<li><label >IP地址：</label><span><?php echo ($data["ip"]); ?></span></li>
		<li><label>留言内容：</label><div><?php echo ($data["content"]); ?></div></li>
		<p style="border: 2px solid; border-color: #3c95c8; width: 300px;"><p/>
		<li><label>回复管理员：</label><div><?php echo ($data["admin"]); ?></div></li>
		<li><label>回复时间：</label><div><?php echo (date("Y年m月d日 h:i:s",$data["copytime"])); ?></div></li>
		<li><label>回复内容：</label><label style="padding: 15px; width:700px; background-color:#f2f2f2;margin-bottom:20px"><?php echo ($data["content"]); ?></label></li>
		<li><label>&nbsp;</label><input type="button" onclick="javascript:history.back();" class="btn" value="返回"/></li>
	</ul>
</div>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/dbkl_hqt_project/APP/Admin/View/Public/Css/common/style.css" />
	<script type="text/javascript" src="/dbkl_hqt_project/APP/Admin/View/Public/Js/common/jquery.min.js"></script>
	<script type="text/javascript" src="/dbkl_hqt_project/APP/Admin/View/Public/Js/js.js"></script>
</head>
<body>
<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="#">系统管理</a></li>
		<li><a href="#">大转盘管理</a></li>
		<li><a href="javascript:history.back();">大转盘配置</a></li>
	</ul>
</div>
<div class="formbody">
	<div class="formtitle"><span>奖项配置</span></div>
	<form action="<?php echo U(MODULE_NAME.'/Prize/prizeHandle',array('id'=>$data['id']));?>" method="post">
		<ul class="forminfo">
			<li><label>奖品名称：</label><input name="prize_name" type="text" value="<?php echo ($data["prize_name"]); ?>" class="dfinput" /><i>奖品名称不能为空且不能超过5个字符</i></li>
			<li><label>中奖概率：</label><input name="prize_gl" type="text" value="<?php echo ($data["prize_gl"]); ?>" class="dfinput" /><i>1-10,且所有的概率总和为100</i></li>
			<li><label>&nbsp;</label>
				<input type="submit" class="btn" value="确认保存"/>
				<input type="button" class="btn" onclick="window.history.back(-1);" value="返回"/>
			</li>
		</ul>
	</form>
</div>
</body>
</html>
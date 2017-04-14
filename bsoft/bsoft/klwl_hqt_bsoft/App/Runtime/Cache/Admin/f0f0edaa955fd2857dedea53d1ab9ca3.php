<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理登录界面</title>
<link rel="stylesheet" type="text/css" href="/dbkl_hqt_project/APP/Admin/View/Public/Css/common/style.css" />
<script type="text/javascript" src="/dbkl_hqt_project/APP/Admin/View/Public/Js/common/jquery.min.js"></script>
<script type="text/javascript" src="/dbkl_hqt_project/APP/Admin/View/Public/Js/cloud.js"></script>
<script language="javascript">
	function changeCode(obj){
        obj.attr("src", "<?php echo U(MODULE_NAME.'/Login/code');?>?" + Math.random());
    }
	$(function() {
		$('.loginbox').css({
			'position' : 'absolute',
			'left' : ($(window).width() - 692) / 2
		});
		$(window).resize(function() {
			$('.loginbox').css({
				'position' : 'absolute',
				'left' : ($(window).width() - 692) / 2
			});
		})
	});
</script>
</head>
<body style="background-color: #1c77ac; background-image: url(images/light.png); background-repeat: no-repeat; background-position: center top; overflow: hidden;">

	<form action="<?php echo U('login');?>" method="post" id="form1">
		<div id="mainBody">
			<div id="cloud1" class="cloud"></div>
			<div id="cloud2" class="cloud"></div>
		</div>
		<div class="logintop">
			<span><?php echo ($company); ?>后台管理界面平台</span>
			<ul>
				<li><a href="<?php echo ($companyurl); ?>" target="_parent">回首页</a>
				</li>
				<li><a href="#">帮助</a>
				</li>
				<li><a href="#">关于</a>
				</li>
			</ul>
		</div>
		<div class="loginbody">
			<span class="systemlogo"></span>
			<div class="loginbox">
				<ul>
					<li><input name="name" type="text" class="loginuser"placeholder="账号名" /></li>
					<li><input name="password" type="password" class="loginpwd"placeholder="密码"/></li>
					<li class="yzm"><input name="code" type="text" placeholder="验证码"/><img src="<?php echo U(MODULE_NAME.'/Login/code');?>" onclick="changeCode($('#code'))" id="code" style="position: absolute;top:214px" /></li>
					<li><input type="submit" class="loginbtn" value="登录" /></li>
				</ul>
			</div>
		</div>
	</form>
	<div class="loginbm">版权所有  2013  <a href="<?php echo ($companyurl); ?>"><?php echo ($company); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;官网：<?php echo ($companyurl); ?></div>
	<script>
		if(window.top != window.self){
		    parent.redirect_login();
		}
	</script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<script type="text/javascript" src="/bsoft/APP/Admin/View/Public/Js/common/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css"href="/bsoft/APP/Admin/View/Public/Css/common/style.css" />
	<link rel="stylesheet" href="/bsoft/APP/Admin/View/Public/Css/index.css"/>         <!-- index页面所用 -->
	<script type="text/javascript" src="/bsoft/APP/Admin/View/Public/Js/index.js"></script>
	<base target="iframe"/>
	<title>后台管理</title>
</head>
<body>
	<div style="background:url(/bsoft/APP/Admin/View/Public/Images/topbg.gif) repeat-x; height:88px; min-width: 1040px">
	    <div class="topleft">
	       <img src="/bsoft/APP/Admin/View/Public/Images/logo.png"/>
	    </div>      
	    <ul class="nav">
			<li><a href="default.html" class="selected"><img src="/bsoft/APP/Admin/View/Public/Images/icon01.png"/><h2>工作台</h2></a></li>
			<li><a href="imgtable.html"><img src="/bsoft/APP/Admin/View/Public/Images/icon02.png"/><h2>模型管理</h2></a></li>
			<li><a href="imglist.html"><img src="/bsoft/APP/Admin/View/Public/Images/icon03.png"/><h2>模块设计</h2></a></li>
			<li><a href="tools.html"><img src="/bsoft/APP/Admin/View/Public/Images/icon04.png"/><h2>常用工具</h2></a></li>
			<li><a href="computer.html"><img src="/bsoft/APP/Admin/View/Public/Images/icon05.png"/><h2>文件管理</h2></a></li>
			<li><a href="tab.html"><img src="/bsoft/APP/Admin/View/Public/Images/icon06.png" /><h2>系统设置</h2></a></li>
	    </ul>
	    <div class="topright">    
			<ul>
				<li><span><img src="/bsoft/APP/Admin/View/Public/Images/help.png" class="helpimg"/></span><a href="<?php echo ($technology); ?>" target="_back">帮助</a></li>
				<li><a href="<?php echo U('Index/Index/index');?>" target="_back">官网首页</a></li>
				<li><a href="<?php echo U(MODULE_NAME.'/Index/logout');?>" target="_parent">退出系统</a></li>
			</ul> 
			<div class="user">
				<span><?php echo ($data["username"]); ?></span>
				<i>留言消息</i>
				<a href="<?php echo U(MODULE_NAME.'/Messages/index');?>"><b><?php echo ($msg); ?></b></a>
			</div>    
	    </div>
	</div>
	<div id="left">
		<div class="lefttop"><span></span>导&nbsp;&nbsp;航</div>
		<dl class="leftmenu">
			<?php if(is_array($menu)): foreach($menu as $key=>$v): ?><dd>
					<div class='title'><span><img src='/bsoft/<?php echo ($v["pic"]); ?>' width='16px' height='16px'/></span><?php echo ($v["name"]); ?></div>
					<ul class='menuson'>
						<?php if(is_array($v["child"])): foreach($v["child"] as $key=>$vo): ?><li><cite></cite><a href='<?php echo U(MODULE_NAME."/".$vo['controller']."/".$vo['methods']);?>'><?php echo ($vo["name"]); ?></a><i></i></li><?php endforeach; endif; ?>
					</ul>
				</dd><?php endforeach; endif; ?>
			<dd>
				<div class='title'><span><img src='/bsoft/APP/Admin/View/Public/images/t05.png' width='16px' height='16px'/></span>系统管理</div>
				<ul class='menuson'>
					<li><cite></cite><a href='<?php echo U(MODULE_NAME."/Menu/index");?>'>菜单管理</a><i></i></li>
				</ul>
			</dd>
			<dd>
			<div class='title'><span><img src='/bsoft/APP/Admin/View/Public/Images/i05.png' width='16px' height='16px'/></span>RBAC权限管理</div>
				<ul class='menuson'>
					<li><cite></cite><a href="<?php echo U(MODULE_NAME.'/Rbac/index');?>">用户管理</a><i></i></li>
					<li><cite></cite><a href="<?php echo U(MODULE_NAME.'/Rbac/role');?>" >角色管理</a><i></i></li>
					<li><cite></cite><a href="<?php echo U(MODULE_NAME.'/Rbac/node');?>">节点管理</a><i></i></li>
				</ul>
			</dd>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src="<?php echo U(MODULE_NAME.'/Index/welcome','','html');?>"></iframe>
	</div>
	<script>
		function redirect_login(){
		    location.href = "<?php echo U(MODULE_NAME.'/Login/index');?>";
		}
	</script>
</body>
</html>
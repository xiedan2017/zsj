<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/bsoft/APP/Admin/View/Public/Css/public.css" />
	<script type="text/javascript" src="/bsoft/APP/Admin/View/Public/Js/back/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$('.add-role').click(function(){
				var obj = $(this).parents('tr').clone();
			    obj.find('.add-role').remove();
			    $('#last').before(obj);
			});
			$('.back').click(function(){
		 	window.history.back(-1); 
		   });
		
		})
		</script>
</head>
<body>
<form action="<?php echo U(MODULE_NAME.'/Rbac/addUserHandle');?>" method="post">
	<table class="table">
		<tr>
			<th colspan="2" style="text-align: center; font-size:20px">添加用户</th>
		</tr>
		<tr>
			<td align="right">用户账号:</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td align="right">用户密码:</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>
			<td align="right">所属角色:</td>
			<td>
				<select name="role_id[]" class="choose-role">
					<option>请选择角色</option>
					<?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v["name"]); ?>(<?php echo ($v["remark"]); ?>)</option><?php endforeach; endif; ?>
				</select>
				<span class="add-role">添加一个角色</span>
			</td>
		</tr>
		<tr id="last">
			<td colspan="2" align="center">
				<input type="button" value="返 回" class="back" style="margin:0 40px" />
				<input type="submit" value="保存添加"/>
			</td>
		</tr>
	</table>
</form>
</body>
</html>
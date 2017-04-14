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
<script type="text/javascript" src="/dbkl_hqt_project/APP/Admin/View/Public/Js/common/jquery.validate.min.js"></script>
	<div class="place">
	    <span>位置：</span>
	    <ul class="placeul">
		    <li><a href="#">RBAC权限管理</a></li>
		    <li><a href="#">角色管理</a></li>
		    <li><a href="#">添加角色</a></li>
	    </ul>
	</div>
	<div class="formbody">
	    <div class="formtitle"><span>添加角色</span></div>
	    <form action="<?php echo U(MODULE_NAME.'/Rbac/addRoleHandle');?>" method="post" id="form">
		    <ul class="forminfo">
			    <li><label>角色名称：</label><input name="name" type="text" class="dfinput" /></li>
			    <li><label>角色描述:</label><input name="remark" type="text" class="dfinput" /></li>
			    <li><label>是否显示</label>
			         <cite><input type="radio" name="status" value="1" checked="checked" />&nbsp;开启&nbsp;<input type="radio" name="status" value="0"/>&nbsp;关闭</cite>
			    </li>
			    <li><label>排 序：</label><input name="sort" type="text" class="dfinput" /></li>
				<li><label>&nbsp;</label>
				<input type="submit" class="btn" value="保存添加"/>
				<input type="button" class="btn" onclick="window.history.back(-1);" value="返回"/>
				</li>
		    </ul>
	    </form>
	</div>
  </body>
  <script type="text/javascript">
    $(function(){
        $('#form').validate({
            rules: {
              name: {
                required:true,
                rangelength:[2,10]    //输入字符范围
              },
              remark: {
                required: true,
                rangelength:[2,30],  //输入字符范围
              },
              sort: {
                required: true,
                digits:true
              },
            },
            messages: {
              name: {
                required: "角色名称不能为空",
                rangelength:'请输入2-10之间的字符',
              },
              remark: {
                required: "角色描述不能为空",
                rangelength: "控制器长度不能小于[2,30]个字符",
              },
              sort: {
                required: "排序不能为空",
                digits:"必须是正整数"
              },
            }
        })
   })
</script>
</html>
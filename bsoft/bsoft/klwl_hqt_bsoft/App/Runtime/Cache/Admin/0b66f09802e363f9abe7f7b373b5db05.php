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
		<li><a href="#">栏目管理</a></li>
		<li><a href="#">标签管理</a></li>
		<li><a href="javascript:history.back();">标签<?php if($data.id): ?>编辑<?php else: ?>添加<?php endif; ?></a></li>
	</ul>
</div>
<div class="formbody">
	<div class="formtitle"><span><?php if($data['id']==null): ?>添加<?php else: ?>编辑<?php endif; ?>标签</span></div>
	<form action="<?php echo U(MODULE_NAME.'/Label/labelHandle',array('id'=>$data['id']));?>" method="post" id="form">
		<ul class="forminfo">
			<li><label>标签名称：</label><input name="name" type="text" value="<?php echo ($data["name"]); ?>" class="dfinput" /></li>
			<li><label>标签颜色：</label><input name="color" type="text" value="<?php echo ($data["color"]); ?>" class="dfinput" /></li>
			<li><label>是否显示</label>
				<?php if($data['status'] == 0 ): ?><cite><input name="status" type="radio" value="0" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="status" type="radio" value="1" />否</cite>
					<?php else: ?>
					<cite><input name="status" type="radio" value="0" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="status" type="radio" value="1" checked="checked" />否</cite><?php endif; ?>
			</li>
			<li><label>排 序：</label><input name="sort" type="text" value="<?php echo ($data["sort"]); ?>" class="dfinput" /></li>
			<li><label>&nbsp;</label>
				<input type="submit" class="btn" value="确认保存"/>
				<input type="button" class="btn" onclick="window.history.back(-1);" value="返回"/>
			</li>
		</ul>
	</form>
</div>
<script type="text/javascript">
    $(function(){
	    $('#form').validate({
		    rules: {
		      name: {
		        required:true,
		        rangelength:[2,10], //输入字符范围
		      },
		      color:{
		      	required:true,
		      	rangelength:[3,7], //输入字符范围
		      },
		      sort: {
		        required: true,
		        digits:true
		      },
		    },
		    messages: {
		      name: {
		        required: "用户名不能为空",
		        rangelength:'请输入2-10之间的字符,'
		      },
		      color:{
		      	required:'颜色不能为空',
		      	rangelength:'必须为颜色值', //输入字符范围
		      },
		      sort: {
		        required: "排序不能为空",
		        digits:"必须是正整数"
		      },
		    }
	    })
   })
</script>
</body>
</html>
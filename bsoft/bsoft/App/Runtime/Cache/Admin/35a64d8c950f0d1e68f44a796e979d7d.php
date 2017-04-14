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
	 .avatar_uplpad_btn {
	    background:  url("/klwl_hqt_bsoft/APP/Admin/View/Public/Images/avatar_uplpad_btn.png") no-repeat scroll 0 0;
	    display: inline-block;
	    height: 30px;
	    width: 82px;
	}
	.loading_bar{background: #f2f2f5 none repeat scroll 0 0;border-radius: 6px;display: inline-block;font-size: 0;height: 10px;overflow: hidden;text-align: left;width: 250px;}
	.loading_bar em{background: #fa7d3c none repeat scroll 0 0;display: inline-block;height: 10px;vertical-align: top;}
</style>
<script type="text/javascript" src="/klwl_hqt_bsoft/APP/Admin/View/Public/Js/common/jquery.validate.min.js"></script>
<script type="text/javascript">
        window.UEDITOR_HOME_URL = '/klwl_hqt_bsoft/APP/Admin/View/Public/Data/Ueditor/';
        window.onload = function(){
            //设置编辑器的宽度
            window.UEDITOR_CONFIG.initialFrameWidth = 1000; 
             //设置编辑器的高度
            window.UEDITOR_CONFIG.initialFrameHeight = 400; 
             //配置编辑器图片上传文件的路径
            UE.getEditor('content');   //传入txtarea 的ID即可载入
        }
     </script>
 <script type="text/javascript" src="/klwl_hqt_bsoft/APP/Admin/View/Public/Data/Ueditor/ueditor.config.js"></script>
 <script type="text/javascript" src="/klwl_hqt_bsoft/APP/Admin/View/Public/Data/Ueditor/ueditor.all.min.js"></script>
<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="#">内容管理</a></li>
		<li><a href="#">产品管理</a></li>
		<li><a href="javascript:history.back();">产品管理<?php if($data.id): ?>编辑<?php else: ?>添加<?php endif; ?></a></li>
	</ul>
</div>
<div class="formbody">
	<div class="formtitle"><span><?php if($data['id']==null): ?>添加<?php else: ?>编辑<?php endif; ?>产品管理</span></div>
	<form action="<?php echo U(MODULE_NAME.'/Product/productHandle',array('id'=>$data['id']));?>" method="post" id="form">
		<ul class="forminfo">
			<li><label>产品名称：</label><input name="name" type="text" value="<?php echo ($data["name"]); ?>" class="dfinput" /></li>
			<li><label>所属分类：</label>
				<select name="cate" class="select">
				    <?php if($data['cate'] != null): ?><option value="<?php echo ($data["cate"]); ?>"><?php echo ($data["catename"]); ?></option><?php endif; ?>
					 <?php if(is_array($productcate)): foreach($productcate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</li>
			<li><label>产品描述：</label><input name="title" type="text" value="<?php echo ($data["title"]); ?>" class="dfinput" /></li>
			<li><label>内容详情：</label><textarea name="content" id="content"><?php echo ($data["content"]); ?></textarea></li>
			<li><label>是否推荐</label>
				<?php if($data['red'] == 0 ): ?><cite><input name="red" type="radio" value="0" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="red" type="radio" value="1" />否</cite>
					<?php else: ?>
					<cite><input name="red" type="radio" value="0" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="red" type="radio" value="1" checked="checked" />否</cite><?php endif; ?>
			</li>
			<li><label>是否显示</label>
				<?php if($data['status'] == 0 ): ?><cite><input name="status" type="radio" value="0" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="status" type="radio" value="1" />否</cite>
					<?php else: ?>
					<cite><input name="status" type="radio" value="0" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="status" type="radio" value="1" checked="checked" />否</cite><?php endif; ?>
			</li>
			<li><label>排 序：</label>
			      <input name="sort" type="text" value="<?php echo ($data["sort"]); ?>" class="dfinput" style="float: left;" />
			</li>
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
		        rangelength:[3,10], //输入字符范围
		      },
		      title: {
		        required: true,
		        minlength: 5
		      },
		      sort: {
		        required: true,
		        digits:true
		      },
		    },
		    messages: {
		      name: {
		        required: "用户名不能为空",
		        rangelength:'请输入3-10之间的字符'
		      },
		      title: {
		        required: "描述不能为空",
		        minlength: "描述长度不能小于 5 个字符",
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
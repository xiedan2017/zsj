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
<script type="text/javascript" src="/klwl_hqt_bsoft/APP/Admin/View/Public/Js/common/jquery.validate.min.js"></script>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">栏目管理</a></li>
        <li><a href="#">菜单管理</a></li>
        <li><a href="#"><?php echo ($menu["name"]); ?>编辑</a></li>
        <li><a href="javascript:history.back();" >返回</a></li>
    </ul>
</div>
<div class="formbody">
    <form action="<?php echo U(MODULE_NAME.'/Menu/saveOrUpdate',array('upid'=>$menu['id']));?>" method ="post" enctype="multipart/form-data" id="form">
        <ul class="forminfo">
            <li><h3 style="font-size:16px">添加菜单分类</h3></li>
            <li><label>菜单名称<b>*</b></label><input name="name" type="text" value="<?php echo ($menu["name"]); ?>" class="dfinput"/></li>
            <?php if($pid == 0): if($menu['pid'] == 0): ?><li><label>一级菜单ico<b>*</b></label><input name="pic" type="file" class="dfinput"/></li>
                <?php else: ?>
                    <li><label>控制器名称</label><input name="controller" type="text" value="<?php echo ($menu["controller"]); ?>" class="dfinput"/></li>
                    <li><label>方法名称</label><input name="methods" type="text" value="<?php echo ($menu["methods"]); ?>" class="dfinput"/></li><?php endif; ?>
            <?php else: ?>
                <li><label>控制器名称</label><input name="controller" type="text" value="<?php echo ($menu["controller"]); ?>" class="dfinput"/></li>
                <li><label>方法名称</label><input name="methods" type="text" value="<?php echo ($menu["methods"]); ?>" class="dfinput"/></li><?php endif; ?>

           
            <li><label>是否显示</label>
                <?php if($data['status'] == 0 ): ?><cite><input name="status" type="radio" value="0" checked="checked" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="status" type="radio" value="1" />否</cite>
                    <?php else: ?>
                    <cite><input name="status" type="radio" value="0" />是&nbsp;&nbsp;&nbsp;&nbsp;<input name="status" type="radio" value="1" checked="checked" />否</cite><?php endif; ?>
            </li>
            <li><label>排 序 号</label><input name="sort" type="text" class="dfinput" value="<?php echo ($menu["sort"]); ?>"/></li>
            <li><label>&nbsp;</label>
                <input type="hidden" class="btn" name="pid" value="<?php echo ($pid); ?>"/>
                <input type="submit" class="btn" value="保存添加"/>
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
              controller: {
                required: true,
                rangelength:[2,50], //输入字符范围
              },
              methods: {
                required: true,
                rangelength:[2,10], //输入字符范围
              },
              sort: {
                required: true,
                digits:true
              },
            },
            messages: {
              name: {
                required: "菜单名称不能为空",
                rangelength:'请输入2-10之间的字符',
              },
              controller: {
                required: "控制器不能为空",
                rangelength: "控制器长度不能小于[2,50]个字符",
              },
              methods: {
                required: "方法不能为空",
                rangelength: "控制器长度不能小于[2,10]个字符",
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
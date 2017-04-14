<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($company); ?>后台管理</title>
<link rel="stylesheet" type="text/css" href="/klwl_hqt_bsoft/APP/Admin/View/Public/Css/common/style.css"/>
</head>
<body>
	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">内容管理</a></li>
            <li><a href="#">系统首页</a></li>
        </ul>
    </div>
    <div class="mainindex"> 
        <div class="welinfo">
            <span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/sun.png" alt="天气" /></span>
            <b><strong style="font-size:20px; color:red"><?php echo ($msg["name"]); ?></strong> 您好，欢迎进入<?php echo ($company); ?>  后台管理系统</b>
        </div>
        <div class="welinfo">
            <span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/time.png" alt="时间" /></span>
            <i><a class="ibtn" href="<?php echo U(MODULE_NAME.'/Index/clear');?>">清除数据库碎片</a>您上次登录的时间：<?php echo ($msg["logintime"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;IP为：<?php echo ($msg["loginip"]); ?>&nbsp;&nbsp;&nbsp;&nbsp; IP地址为：<?php echo ($msg["ipaddress"]); ?></i> 
        </div>
        <div class="xline"></div>
        <div class="box"></div>
   <!-- 修改公司LOGO -->
        <div class="welinfo">
            <span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t05.png" alt="LOGO" /></span>
            <b>您好，在这里您可以快速设置网站LOGO</b>
        </div>
        <form action="<?php echo U(MODULE_NAME.'/Index/setlogo');?>" method ="post" enctype="multipart/form-data">
            <div class="welinfo" style="height: 120px;">
              <span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t02.png" alt="logo" />网站LOGO</span>
              <i><img src="/klwl_hqt_bsoft/<?php echo ($logo['pic']); ?>" alt="网站logo" style="height: 105px; width: 231px;" />&nbsp;&nbsp;<label>尺寸: 231px* 72px</label>&nbsp;&nbsp;<input name="picname" type="file" class="dfinput" style="text-indent: 2px; width:250px"/></i> 
              <input type="submit" class="btn" value="保存设置"/>
            </div>
        </form>
    <!-- 后台使用指南 -->
        <div class="xline"></div>
        <div class="box"></div>
        <div class="welinfo">
            <span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/dp.png" alt="提醒" /></span>
            <b><?php echo ($company); ?>后台管理系统使用指南</b>
        </div>
        <ul class="infolist">
            <li><span>您可以快速进行产品上传</span><a class="ibtn" href="<?php echo U(MODULE_NAME.'/Goods/edit');?>">上传产品</a></li>
        </ul> 
        <div class="xline"></div>
        <div class="uimakerinfo"><b>查看网站使用指南，了解更多。点击查看：<a href="<?php echo ($companyurl); ?>" target="_blank" style="color: red;">广州开利网络科技有限公司</a></b></div>
    </div>
    <div class="xline"></div>
</body>

</html>
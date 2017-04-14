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
<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="#">企业管理</a></li>
		<li><a href="#">邮件管理</a></li>
	</ul>
</div>
<div class="rightinfo">  
	<div class="tools">
		<ul class="seachform">
			<li><label>SMPT:</label><input name="smpt" type="text" value="<?php echo ($emailconfig["smpt"]); ?>" placeholder="smtp.189.cn" class="scinput"/></li>
			<li><label>发件人邮箱:</label><input name="account" value="<?php echo ($emailconfig["account"]); ?>" placeholder="17701959703@189.cn" type="text" class="scinput"/></li>
			<li><label>密码:</label><input name="pwd" type="password" value="<?php echo ($emailconfig["pwd"]); ?>" placeholder="extellar419431" class="scinput"/></li>
			<li><label>&nbsp;</label><input type="button" class="scbtn" value="配置" id="config" /></li>
			<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/SendEmail/edit');?>" class="toolbar"><span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/t01.png" /></span>发邮件</li> 	            
		</ul>
	</div>    
</div>
<table class="tablelist">
	<tr>
		<th width="2%">&nbsp;</th>
		<th width="5%">序 号</th>
		<th width="10%">收件人</th>
		<th width="15%">邮件标题</th>
		<th width="8%">发送时间</th>
		<th width="10%">收件人</th>
		<th width="10%">状态</th>
		<th>操 作</th>
	</tr>
	<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr style="white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">
			<td></td>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["send"]); ?></td>
			<td><?php echo (subtext($v["title"],20)); ?></td>
			<td><?php echo (date('Y-m-d h:i',$v["time"])); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			<?php if($v['status']==0): ?><td class="green">发送成功</td>
				<?php else: ?>
				<td class="red">发送失败</td><?php endif; ?>
			<td class="caozuo">
			    <li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/SendEmail/search',array('id'=>$v['id']));?>"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/search.png"/>查看详情</li>
			    <li onclick="del(this)" src="<?php echo U(MODULE_NAME.'/SendEmail/delete',array('del'=>$v['id']));?>"><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/close1.png"/>删除</li>
			</td>
		</tr><?php endforeach; endif; ?>   
</table>
<div class="tip">
	<div class="tiptop"><span>提示信息</span><a></a></div>
    <div class="tipinfo">
        <span><img src="/klwl_hqt_bsoft/APP/Admin/View/Public/Images/ticon.png" /></span>
        <div class="tipright">
	        <p>是否确认对该信息删除吗 ？</p>
	        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
        </div>
    </div>
    <div class="tipbtn">
        <input type="button"  class="sure" value="确定删除" />&nbsp;
        <input type="button"  class="cancel" value="取消" />
    </div>
</div>
<script type="text/javascript">
	$(function(){
		$('#config').click(function() {
			var smpt = $('input[name=smpt]').val();
			var account = $('input[name=account]').val();
			var pwd = $('input[name=pwd]').val();
			if(smpt ==''){
				alert('SMPT不能为空');
				return;
			}
			if(account == ''){
				alert('发件人邮箱不能为空');
				return;
			}
			if(pwd == ''){
				alert('邮箱密码不能为空');
				return;
			}
			$.ajax({
				url:"<?php echo U(MODULE_NAME.'/SendEmail/emailConfig');?>",
				type:'post',
				data:{
					 smpt: smpt,
	    			 account: account,
	    			 pwd:pwd,
				},
				success:function(data) {
					alert('配置成功！！！');
				}
			})

		})
	})
</script>
</body>
</html>
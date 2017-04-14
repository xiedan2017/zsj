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
<script  type="text/javascript" src="/dbkl_hqt_project/APP/Admin/View/Public/Js/date/WdatePicker.js"></script>
<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="#">系统管理</a></li>
		<li><a href="#">大转盘管理</a></li>
	</ul>
</div>
<div class="rightinfo">  
	<div class="tools">
		<ul class="seachform">
			<li><label>开始时间：</label><input name="starttime" type="text" value="<?php echo ($confdata["prize_name"]); ?>" class="scinput Wdate" style="width:100px;" onFocus="WdatePicker({onpicking: function(dp){}})"/></li>
			<li><label>结束时间：</label><input name="endtime" type="text" value="<?php echo ($confdata["prize_gl"]); ?>" class="scinput Wdate" style="width:100px;" onFocus="WdatePicker({onpicking: function(dp){}})"/></li>
			<li><label>抽奖次数：</label><input name="num" type="text" value="<?php echo ($confdata["admin"]); ?>" class="scinput" style="width:100px;"/></li>
			<li><label>&nbsp;</label><input type="button" class="scbtn config" value="配置"/></li>         
		</ul>
	</div>    
</div>
<form action="<?php echo U(GROUP_NAME.'/Prize/prize_gv');?>" method="post">
	<table class="tablelist">
		<tr>
			<th width="2%">&nbsp;</th>
			<th width="5%">序 号</th>
			<th width="10%">奖项名称</th>
			<th width="15%">奖项概率</th>
			<th width="15%">配置管理员</th>
			<th>操 作</th>
		</tr>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td></td>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["prize_name"]); ?></td>
				<td><input type="text" name ="<?php echo ($v["id"]); ?>" value="<?php echo ($v["prize_gl"]); ?>" class="sort"></td>
				<td><?php echo ($v["admin"]); ?></td>			
				<td class="caozuo">
					<li onclick="update(this)" src="<?php echo U(MODULE_NAME.'/Prize/edit',array('id'=>$v['id']));?>"><img src="/dbkl_hqt_project/APP/Admin/View/Public/Images/peizhi.jpg"/>配置</li>
				</td>
			</tr><?php endforeach; endif; ?>
		    <tr style="height: 65px">
				<td colspan ="8" align="center"><input type="submit" class="btn" value="配置" /></td>
			</tr>
	</table>
</form>
<div class="tip">
	<div class="tiptop"><span>提示信息</span><a></a></div>
	<div class="tipinfo">
		<span><img src="/dbkl_hqt_project/APP/Admin/View/Public/Images/ticon.png" /></span>
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
		$('.config').click(function(){
			$.ajax({
					url:"<?php echo U(MODULE_NAME.'/Prize/prizeConfig');?>",
					type:"POST",
					data:{
						starttime:$('input[name=starttime]').val(),
						endtime:$('input[name = endtime]').val(),
						num:$('input[name = num]').val()
					},
					success:function(obj){
						if(obj == 1){
							alert('配置成功');
						}else{
							alert('配置失败');
						}
					}
			});
		})
	})
</script>
</body>
</html>
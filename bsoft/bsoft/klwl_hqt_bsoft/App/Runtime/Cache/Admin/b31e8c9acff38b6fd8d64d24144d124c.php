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
<div class="place">
	<span>位置：</span>
	<ul class="placeul">
		<li><a href="#">栏目管理</a></li>
		<li><a href="#">产品类型管理</a></li>
		<li><a href="javascript:history.back();">产品类型<?php if($data.id): ?>编辑<?php else: ?>添加<?php endif; ?></a></li>
	</ul>
</div>
<div class="formbody">
	<div class="formtitle"><span><?php if($data['id']==null): ?>添加<?php else: ?>编辑<?php endif; ?>产品类型</span></div>
	<form action="<?php echo U(MODULE_NAME.'/Productcate/productcateHandle',array('id'=>$data['id']));?>" method="post" id="form">
		<ul class="forminfo">
			<li><label>产品类型名称：</label><input name="name" type="text" value="<?php echo ($data["name"]); ?>" class="dfinput" /></li>
			<li><label>产品照片：</label>
				<div class="avatar_area">
		            <a href="javascript:void(0);" class="avatar_uplpad_btn" id="avatar_uplpad_btn"></a>
		            <div id="avatar_pic">
		                <a  target="_blank" href="<?php echo ($data["pic"]); ?>">
		                    <img alt="图片" src="<?php echo ((isset($data["pic"]) && ($data["pic"] !== ""))?($data["pic"]):'/klwl_hqt_bsoft/APP/Admin/View/Public/Images/addpic.png'); ?>" style="height: 100px;float: left; margin:10px" class="delpic" />
		                </a>
		            </div>
		            <input type="hidden" name="pic" value="<?php echo ($data["pic"]); ?>"/>
		            <div id="loading_bar" style="display:none">
		                <p id="updesc">图片上传中...</p>
		                <span class="loading_bar"><em id="percent" style="width: 27%;"></em></span>
		                <span id="percentnum">27%</span>
		            </div>
		        </div>
			</li>
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
			<li><label>排 序：</label><input name="sort" type="text" value="<?php echo ($data["sort"]); ?>" class="dfinput" /></li>
			<li><label>&nbsp;</label>
				<input type="submit" class="btn" value="确认保存"/>
				<input type="button" class="btn" onclick="window.history.back(-1);" value="返回"/>
			</li>
		</ul>
	</form>
</div>
<script type="text/javascript" src="/klwl_hqt_bsoft/APP/Admin/View/Public/Js/plupload/plupload.full.min.js"></script>
<script type="text/javascript">
    var uploader_avatar = new plupload.Uploader({   //创建实例的构造方法
        runtimes: 'gears,html5,html4,silverlight,flash',  //上传插件初始化选用那种方式的优先级顺序
        browse_button: ['avatar_uplpad_btn'],   // 上传按钮
        url: "<?php echo U(MODULE_NAME.'/Productcate/uploadImage');?>",   //远程上传地址
        filters: {
            max_file_size: '10mb',  //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
            mime_types: [     //允许文件上传类型
                {title: "files", extensions: "jpg,png,gif,jpeg"}
            ]
        },
        multi_selection: false,    //true:ctrl多文件上传, false 单文件上传
        init: {
            FilesAdded: function(up, files) {  //文件上传前
            	$.ajax({
            		url:"<?php echo U(MODULE_NAME.'/Productcate/delpic');?>",
            		data:{
            			"path" : $('.delpic').attr('src'),
            		},
            		type:"post"
            	});
                $("#avatar_pic").hide();
                $("#loading_bar").show();
                uploader_avatar.start();
            },
            UploadProgress: function(up, file) {   //上传中，显示进度条
                var percent = file.percent;
                $("#percent").css({"width": percent + "%"});
                $("#percentnum").text(percent + "%");
            },
            FileUploaded: function(up, file, info) {    //文件上传成功的时候触发
                var data = eval("(" + info.response + ")");   //解析返回的json数据
                $("#avatar_pic").html("<img  src='" + data.pic + "' style='height: 100px;float: left; margin:10px' class='delpic'/>");
                $('input[type=hidden]').val(data.pic);
                $("#loading_bar").hide();
                $("#avatar_pic").show();
            },
            Error: function(up, err) {  //上传出错的时候触发
                alert(err.message);
                $("#loading_bar").hide();
            }
        }
    });
    uploader_avatar.init();
</script>
<script type="text/javascript">
    $(function(){
	    $('#form').validate({
		    rules: {
		      name: {
		        required:true,
		        rangelength:[2,10], //输入字符范围
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
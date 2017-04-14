<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="YES">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title>幸运大转盘</title>
        <style type="text/css">
            .demo{ position:relative;width:275px; height: 275px; margin: 0 auto;}
            #start{width:163px; height:320px; position:relative;bottom: 237px; left: 89px;}
            #start img{cursor:pointer}
        </style>
    </head>
    <body>
        <div class="demo">
			<div id="disk"><img src="/dbkl_hqt_project/Public/Images/disk.jpg" style="height: 275px;" /></div>
			<div id="start"><img src="/dbkl_hqt_project/Public/Images/start.png" id="startbtn" style="height: 62%;" /></div>
		</div> 
		<div>fsejirogfjse</div>
        <script type="text/javascript" src="http://www.sucaihuo.com/Public/js/other/jquery.js"></script>
        <script type="text/javascript" src="/dbkl_hqt_project/Public/js/jQueryRotate.2.2.js"></script>
        <script type="text/javascript" src="/dbkl_hqt_project/Public/js/jquery.easing.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#startbtn").click(function() {
                    lottery();
                });
            });
            function lottery() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo U(MODULE_NAME.'/Prize/wheel');?>",
                    dataType: 'json',
                    cache: false,
                    error: function() {
                        alert('Sorry，出错了！');
                        return false;
                    },
                    success: function(json) {
                        if(json == 1){
                           alert('活动还未开始，敬请期待');
                        }else if(json == 2){
                           alert('本次机会已经用完了，下次再来吧');
                        }else{
                            $("#startbtn").unbind('click').css("cursor", "default");
                            var angle = json.angle; //指针角度 
                            var prize = json.prize; //中奖奖项标题 
                            $("#startbtn").rotate({
                                duration: 3000, //转动时间 ms
                                angle: 0,                    //从0度开始
                                animateTo: 3600 + angle,     //转动角度 
                                easing: $.easing.easeOutSine, //easing扩展动画效果
                                callback: function(){
                                    var resulte = confirm('恭喜您中得' + prize + '\n想要继续吗？');
                                    if (resulte){             //若是点击确定，继续抽奖
                                        lottery();
                                    }
                                }
                            });
                        }
                    }
                });
            }
        </script>
    </body>
</html>
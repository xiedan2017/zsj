<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> 广州碧软信息科技有限公司 </title>
        <link href="/klwl_hqt_bsoft/Public/css/index.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="/klwl_hqt_bsoft/Public/js/jquery-1.9.1.min.js"/></script>
    </head>
    <body>
        <div class="top">
            <div class="topzhong"> <div class="lianxi"> <a href="<?php echo U(MODULE_NAME.'/Contact/Index');?>"> 联系我们 </a> </div></div>
        </div>
        <div class="log">
            <div class="logo">
                <a href="<?php echo ($url); ?>"> <img src="/klwl_hqt_bsoft/Public/images/logo1.png" width="134" height="43" /> </a>
            </div>
            <div class="dh">
                <ul>
                    <li> <a href="<?php echo U(MODULE_NAME.'/Index/index');?>"> 首页 </a> </li>
                    <?php if(is_array($menu)): foreach($menu as $key=>$v): ?><li>
                            <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$v['id'],'pid'=>$v['product'][0]['id']));?>"> <?php echo ($v["name"]); ?> </a>
                            <div class="erji-1">
                                <?php if(is_array($v["product"])): foreach($v["product"] as $key=>$vo): if($vo['name'] == 新闻中心): ?><div class="aa">
                                            <a href="<?php echo U(MODULE_NAME.'/News/index',array('cate'=>$vo['id']));?>"> <?php echo ($vo["name"]); ?> </a>
                                        </div>
                                    <?php else: ?>
                                        <div class="aa">
                                            <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$vo['cate'],'pid'=>$vo['id']));?>"> <?php echo ($vo["name"]); ?> </a>
                                        </div><?php endif; endforeach; endif; ?>
                                <div style="clear:both"> </div>
                            </div>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.dh > ul > li').hover(function() {
                    $(this).find(".erji").slideDown("slow");
                },
                function() {
                    $(this).find(".erji").slideUp("slow");
                });

                $('.erji > .aa').hover(function() {
                    $(this).find(".sanji").slideDown("slow");
                },
                function() {
                    $(this).find(".sanji").slideUp("slow");
                });
                $('.dh > ul > li').hover(function() {
                    $(this).find(".erji-1").slideDown("slow");
                },
                function() {
                    $(this).find(".erji-1").slideUp("slow");
                });

                $('.sanji > .sanji1').each(function() {
                    $(this).find('a').eq(0).addClass("a1");
                });

            });
        </script>
<div class="atcker">
    <div class="dhy1">
        <ul>
            <li>
                <?php if(is_array($leftmenu)): foreach($leftmenu as $key=>$vo): if($vo['name'] == 新闻中心): ?><a href="<?php echo U(MODULE_NAME.'/News/index',array('cate'=>$vo['id']));?>" <?php if($pid == $vo['id']): ?>style="color: red;"<?php endif; ?>> <?php echo ($vo["name"]); ?> </a>
                    <?php else: ?>
                        <a href="<?php echo U(MODULE_NAME.'/Product/detail',array( 'cate'=>$vo['cate'],'pid'=>$vo['id']));?>" <?php if($pid == $vo['id']): ?>style="color: red;"<?php endif; ?>> <?php echo ($vo["name"]); ?> </a><?php endif; endforeach; endif; ?>
            </li>
        </ul>
    </div>
    <div class="zuo">
        <div class="tu"> <img src="<?php echo ((isset($productcate["pic"]) && ($productcate["pic"] !== ""))?($productcate["pic"]):'/klwl_hqt_bsoft/Public/images/1-151125114634439.jpg'); ?>" width="926" height="170"/> </div>
        <div class="dyzhengwen">
            <div class="dyzhengwenzuo">
                <div class="dingwei1">
                    <span>新闻中心</span>
                    <br />
                    <h3><?php echo ($details["title"]); ?></h3>
                    <?php echo (date("Y-m-d",$details["time"])); ?>
                    <div class="p"><?php echo ($details["content"]); ?></div>
                </div>
            </div>
            <div class="dyzhengwenyou">
                <?php if(is_array($red)): foreach($red as $key=>$v): ?><div class="hezuo">
                        <h3>
                            <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$v[cate],'pid'=>$v['id']));?>"> <?php echo ($v["name"]); ?> </a>
                        </h3>
                        <ul class="ul1">
                            <?php echo (subtext($v["title"],31)); ?>
                            <div style="clear:both;"></div>
                        </ul>
                    </div><?php endforeach; endif; ?>
                <div class="hezuo">
                    <h3> 请关注我们 </h3>
                    <ul>
                        <li> <img class="weixin" src="/klwl_hqt_bsoft/Public/images/bag10.png" width="19" height="18"/> </li>
                        <li> <img src="/klwl_hqt_bsoft/Public/images/bag11.png" width="19" height="18" /> </li>
                        <li> <img src="/klwl_hqt_bsoft/Public/images/bag12.png" width="19" height="18" /> </li>
                    </ul>
                </div>
            </div>
            <!--二维码-->
            <div class="d_wx" style="display:none;background:white;width:250px;height:110px;position:absolute;z-index:10;left:1040px;top:500px;">
                <img class="p_weixin" src="/klwl_hqt_bsoft/Public/images/weixin.jpg" alt="二维码" style="width:90px;height:90px;margin:10px 0 0 10px;">
                <p style="font-family:'微软雅黑';font-size:12px; margin:-62px 0 0 120px;line-height:14px;">
                    用微信扫描二维码
                    <br />
                    分享至好友和朋友圈
                </p>
            </div>
            <script>
                $(function() {
                    $('.weixin').css('cursor', 'pointer');
                    $('.weixin').mouseover(function() {
                        $('.d_wx').css('display', 'block');
                    });
                    $('.weixin').mouseout(function() {
                        $('.d_wx').css('display', 'none');
                    });
                    $('.wx_close').css('cursor', 'pointer');
                    $('.wx_close').click(function() {
                        $('.d_wx').css('display', 'none');
                    });
                });
            </script>
        </div>
  </div>
  <div style="clear:both"> </div>
</div>
	<div class="bottom">
	  <div class="bottom1">
	      Copyright©版权所有：广州碧软信息科技有限公司 粤公网安备44010602001238号
	      <a href="<?php echo U(MODULE_NAME.'/Contact/index');?>" target="_blank"> 联系我们 </a>
	      <a href="http://www.kailly.cn/" target="_blank"> (技术支持：开利网络) </a>
	      <a href="http://www.miitbeian.gov.cn/" target="_blank"> 粤ICP备11010423号 </a>
	  </div>
	</div>
  </body>
</html>
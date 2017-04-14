<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> 广州碧软信息科技有限公司 </title>
        <link href="/bsoft/Public/css/index.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="/bsoft/Public/js/jquery-1.9.1.min.js"/></script>
    </head>
    <body>
        <div class="top">
            <div class="topzhong"> <div class="lianxi"> <a href="<?php echo U(MODULE_NAME.'/Contact/Index');?>"> 联系我们 </a> </div></div>
        </div>
        <div class="log">
            <div class="logo">
                <a href="<?php echo ($url); ?>"> <img src="/bsoft/Public/images/logo1.png" width="134" height="43" /> </a>
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
<div class="barren">
    <img src="/bsoft/Public/images/barren.jpg" width="100%" />
</div>
<div class="index-guangyu">
    <div class="index-guangyut">
        <div class="guanyu" style="position:relative;">
            <ul>
                <li> <img class="weixin" src="/bsoft/Public/images/bag10.png" width="19" height="18"/> </li>
                <li> <img src="/bsoft/Public/images/bag11.png" width="19" height="18" /> </li>
                <li> <img src="/bsoft/Public/images/bag12.png" width="19" height="18" /> </li>
            </ul>
            <!--二维码-->
            <div class="d_wx" style="display:none;background:white;width:250px;height:110px;position:absolute;z-index:10;left:800px;top:40px;">
                <img class="p_weixin" src="/bsoft/Public/images/weixin.jpg" alt="二维码" style="width:90px;height:90px;margin:10px 0 0 10px;">
                <p style="font-family:'微软雅黑';font-size:12px; margin:-80px 0 0 120px;line-height:14px;"> 请关注我们 <br /> <br /> 用微信扫描二维码 <br /> 分享至好友和朋友圈 </p>
            </div>
        </div>
    </div>
    <div class="guanyuz">
        <div class="gyz">
            <div class="gyzt">
                <a class="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> 服务范围 </a>
                <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> <img src="/bsoft/Public/images/mo.png" width="37" height="12" /> </a>
            </div>
            <ul>
                <li>
                    <img src="/bsoft/Public/images/tu-1.jpg" width="35" height="35" />
                    <p>
                        <span> <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> 咨询服务 </a> </span>
                        <br />
                        咨询互联网+、大数据、IT规划，
                        <a style="color:#999;" href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> 详情 </a>
                    </p>
                    <div style="clear:both;"> </div>
                </li>
                <li>
                    <img src="/bsoft/Public/images/tu-2.jpg" width="35" height="35" />
                    <p>
                        <span> <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> 产品工程服务 </a> </span>
                        <br />
                        提供碧软公司产品、工程服务等，
                        <a style="color:#999;" href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> 详情 </a>
                    </p>
                    <div style="clear:both;"> </div>
                </li>
                <li>
                    <img src="/bsoft/Public/images/tu-3.jpg" width="35" height="35" />
                    <p>
                        <span> <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> IT服务 </a> </span>
                        <br />
                        提供软件服务、软件应用开发等，
                        <a style="color:#999;" href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> 详情 </a>
                    </p>
                    <div style="clear:both;"> </div>
                </li>
                <li>
                    <img src="/bsoft/Public/images/tu-4.jpg" width="35" height="35" />
                    <p>
                        <span> <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> 业务流程外包服务 </a> </span>
                        <br />
                        提供业务流程外包、人才外包等，
                        <a style="color:#999;" href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$service['cate'],'pid'=>$service['id']));?>"> 详情 </a>
                    </p>
                    <div style="clear:both;"> </div>
                </li>
            </ul>
        </div>
        <div class="gyzo">
            <div class="gyzt">
                <a class="<?php echo U(MODULE_NAME.'/News/index');?>"> 新闻中心 </a>
                <a href="<?php echo U(MODULE_NAME.'/News/index',array('cate'=>$news[0][cate]));?>"> <img src="/bsoft/Public/images/mo.png" width="37" height="12" /> </a>
            </div>
            <ul>
                <?php if(is_array($news)): foreach($news as $key=>$v): ?><li>
                        <p>
                            <a href="<?php echo U(MODULE_NAME.'/News/details',array('newsid'=>$v['id']));?>">
                                <strong> <?php echo (subtext($v["name"],25)); ?> </strong>
                                <span> <?php echo (date('Y-m-d',$v["time"])); ?> </span>
                            </a>
                            <br />
                            <span class="span1"> <?php echo (subtext($v["title"],35)); ?> </span>
                        </p>
                        <div style="clear:both;"> </div>
                    </li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="gyy">
            <div class="gyzt"> <a href="<?php echo U(MODULE_NAME.'/Product/detail',array('cate'=>$job['cate'],'pid'=>$job['id']));?>"> 加入广州碧软 </a> </div>
            <div class="tu">
                <img src="/bsoft/Public/images/lianxi.png" width="230" height="90" />
                <p> 如果您认同我们的价值观，和我们一样充满 激情，请和我们一起续写IT职业生涯的美好前程。 </p>
            </div>
            <div class="gyzx">
                <a href="<?php echo U(MODULE_NAME.'/Contact/index');?>"> 联系我们 </a>
                <p style=" margin-left:7px; line-height:22px;"> 您可以在线提交您的需求,我们会及时与您联系。 </p>
            </div>
        </div>
    </div>
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
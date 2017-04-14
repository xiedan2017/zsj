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
                <a href="<?php echo U(MODULE_NAME.'/Index/index');?>"> <img src="/klwl_hqt_bsoft/Public/images/logo1.png" width="134" height="43" /> </a>
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
<script type="text/javascript" src="/klwl_hqt_bsoft/Public/js/jquery.validate.min.js"></script>
<style type="text/css">
  .error{
    color: red;
    padding-left:10px 
  }
  .button,.button1{
    cursor: pointer;
  }
</style>
<div class="lian">
      <div class="tu"><img src="/klwl_hqt_bsoft/Public/images/1-151125115450542.jpg" width="1128" height="170"/></div>
      <div class="h">
          <span>联系我们</span>          
          <font color=#000000> 总部地址：广州市天河区天河北路908号高科大厦B座1802室 </font>
      </div>
      <div class="renli">
        <div class="p1">
          <p> 人力资源 <br /> 电话： <br /> 020-2223 3502(中国) <br /> 020-2223 3504(中国) <br /> 传真：+86-20-2223 3502 <br /> 邮箱:hr@bi-rept.com </p>
        </div>
        <div class="p2">
          <p> 业务咨询 <br /> 电话： <br /> 13682289885 (手机) <br /> 020-20-2223 3507 (中国) <br /> +1-877-596-4845（美国） <br /> 传真：+86-20-2223 3502 <br /> 邮箱:sales@bi-rept.com <br /> </p>
        </div>
        <div class="p3">
          <p> 媒体公关 <br /> 电话： <br /> 020-2223 3540(中国) <br /> 传真：+86-20-2223 3502 <br /> 邮箱: info@bi-rept.coms <br /> </p>
        </div>
        <div class="p4">
          <p> 投资者信箱 <br /> 电话： <br /> 020-2223 3562 <br /> 传真：+86-20-2223 3502 <br /> 邮箱: info@bi-rept.com </p>
        </div>
      </div>
      <div class="input">
        <h2> 提交需求 </h2>
        <p class="p1">
          感谢您对碧软科技的关注！为便于我们更好的为您服务，请填写下面信息。我们会在2个工作日内由专人与您联系并答复您的需求。
        </p>
        <p class="p2"> 带(*)标记的为必填项 </p>
        <form action="<?php echo U(MODULE_NAME.'/Contact/msgHandle');?>" method="post" id ="form">
            <ul>
              <li>
                <p> *姓名： </p>
                <input type='text' name='name' class="text" value='' />
              </li>
              <li>
                <p> *电子邮件：</p>
                <input type='text' name='email' class="text" value='' />
              </li>
              <li>
                <p> *公司/机构/学校：</p>
                <input type='text' name='school' class="text" value='' />
              </li>
              <li>
                <p> *职位：</p>
                <input type='text' name='job' class="text" value='' />
                <li>
                  <p> *国家/地区：</p>
                  <input type='text' name='address' class="text" value='' />
                </li>
                <li>
                  <p> *联系电话：</p>
                  <input type='text' name='phone' class="text" value='' />
                </li>
                <li>
                  <p> *请描述您的业务和服务需求：</p>
                  <textarea name='content' id='miaoshu' class="text1"></textarea>
                </li>
                <p class="p3"> 提示：您提交的信息会被保密，不会被转发或与任何无关的个人或机构共享。 </p>
                <input type="submit" name="submit" value="提　交" class='button' />
                <input type="reset" name="reset" value="重　置" class='button1' />
            </ul>
        </form>
      </div>
      <div style="clear:both"></div>
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
<script type="text/javascript">
    $(function(){
      $('#form').validate({
        rules: {
          name: {
            required:true,
            rangelength:[2,15], //输入字符范围
          },
          email: {
            required:true,
            email:true //输入字符范围
          },
          school:{
            required:true,
            rangelength:[2,25], //输入字符范围
          },
          job:{
            required:true,
            rangelength:[2,25], //输入字符范围
          },
          address:{
            required:true,
            rangelength:[2,25], //输入字符范围
          },
          phone:{
            required:true,
            digits:true,
            rangelength:[11,11], //输入字符范围
          },
          content:{
            required:true,
          }
        },
        messages: {
          name: {
            required: "用户名不能为空",
            rangelength:'请输入2-15之间的字符'
          },
          email: {
            required:"邮箱不能空",
            email:"邮箱格式不合法"  //输入字符范围
          },
          school:{
            required:'学校不能为空',
            rangelength:'请输入2-25之间的字符', //输入字符范围
          },
          job:{
            required:'职位不能为空',
            rangelength:'请输入2-25之间的字符', //输入字符范围
          },
          address:{
            required:'地区不能为空',
            rangelength:'请输入2-25之间的字符', //输入字符范围
          },
          phone:{
            required:'手机号不能为空',
            digits:'必须是正整数',
            rangelength:'请输入合法的手机号', //输入字符范围
          },
          content:{
            required:'留言不能为空',
          }
        }
      })
   })
</script>
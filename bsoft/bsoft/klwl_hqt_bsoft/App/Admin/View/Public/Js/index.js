$(function(){
	//页面框架显示控制
	resize_window();
	$(window).resize(function(){
		resize_window();
	})	
	function resize_window(){
	$("#left").height($(window).height()-102);
	$("#right").height($(window).height()-88).width($(window).width()-201);
	}
	//导航切换
	$(".menuson li").click(function(){
		$(".menuson li.active").removeClass("active")
		$(this).addClass("active");
	});
	//顶部导航切换
	$(".nav li a").click(function(){
			$(".nav li a.selected").removeClass("selected")
			$(this).addClass("selected");
	});
	//一级菜单收缩展开控制
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('ul').slideUp();
		if($ul.is(':visible')){
			$(this).next('ul').slideUp();
		}else{
			$(this).next('ul').slideDown();
		}
	});
})	
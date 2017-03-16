;(function($){
	$(document).ready(function(){
		var $lis=$('.free-title-ul').children();
		var $contents=$('.free-wrap-content');
		chenge($lis,$contents);
		
		var $li2=$('.city-title-ul').children();
		var $cityContents=$('.city-content');
		chenge($li2,$cityContents);
//		$li2.each(function(a){
//			$(this).mouseover(function(){
//				$(this).attr('class','chengeLi');
//				$(this).siblings().attr('class','');
//				$($cityContents[a]).fadeIn(400);
//				$($cityContents[a]).siblings().fadeOut(400);
//			})
//		})
		//封装改变导航栏对应的内容
		function chenge(con1,con2){
			con1.each(function(a){
			$(this).mouseover(function(){
				$(this).attr('class','chengeLi');
				$(this).siblings().attr('class','');
				$(con2[a]).fadeIn(400);
				$(con2[a]).siblings().fadeOut(400);
			})						
		  })
		}
		

	})
})(jQuery)

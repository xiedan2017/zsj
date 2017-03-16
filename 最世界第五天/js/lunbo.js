window.onload = function(){
	var last = document.getElementsByClassName('befor')[0];
//	console.log(last);
	var next = document.getElementsByClassName('next')[0];
//	console.log(next);
	//获取四个个按钮
	var inputs = document.querySelectorAll(".inputs>li");
//	console.log(inputs);
	//获取四个图片
	var divs = document.querySelectorAll(".lunbo-pic>a");
//	console.log(divs);
	//获取轮播最外层div
	var wrap = document.querySelector(".lunbo");
//	console.log(wrap);
	//获取包裹4张图片的div
	var middle = document.querySelector(".lunbo-pic");
//	console.log(middle);

	var w = wrap.offsetWidth;
	
		var index = 0;
		
		middle.style.width = w*divs.length + "px";
		
		function nextFn(){
			index++;
//			console.log(index);
			if (index>divs.length-1){
				index = 0;
			}
			var l = -index * w;
			middle.style.left = l + "px";
            for(var m=0;m<inputs.length;m++){
                inputs[m].className = '';
            }
            inputs[index].className = 'orange';
		}
		
		function clearTimer(){
			clearInterval(timer);
			timer = setInterval(function (){
			
				nextFn();
			},2000);
		}
		
		var timer = setInterval(function (){
			
			nextFn();
		},2000);
		
		next.onclick = function (){
			
			nextFn();
			clearTimer();
		}
		
		last.onclick = function (){
            clearTimer();
			index--;
			if (index<0){
				index = divs.length-1;
			}
			var l = -index*w;
			middle.style.left = l + "px";
            for(var n=0;n<inputs.length;n++){
                inputs[n].className="";
            }
            inputs[index].className="orange";
			

		}
		
		for (var i=0,len=inputs.length; i<len; i++){
			
//			inputs[i].index = i;
//			inputs[i].onclick = function (){
//                //index保存的是当前点击的input的对应的下标
//				index = this.index;
//                for(var j=0;j<inputs.length;j++){
//                    inputs[j].className = '';
//                }
//                inputs[index].className = 'orange';
//				var l = -index*w;
//				middle.style.left = l + "px";
//				clearTimer();
//			}

            (function(a){
                inputs[i].onclick = function (){

                    for(var j=0;j<inputs.length;j++){
                        inputs[j].className = '';
                    }
                    inputs[a].className = 'orange';
                    var l = -a*w;
                    middle.style.left = l + "px";
                    clearTimer();
                }
            })(i);
		}
		
//		wrap.onmouseover = function(){
//			clearInterval(timer);
//		}
//		wrap.onmouseout = function (){
//			clearTimer();
//		}
}


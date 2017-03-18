//前面已经在轮播js中加过window.onload了，这里就不能再加了
function ajax(url,data,success){
        var xml = window.XMLHttpRequest ? new XMLHttpRequest():new ActiveXObject('Microsoft.XMLHTTP');
        xml.open('get',url+data,true);
        xml.onreadystatechange = function(){
            if(xml.readyState == 4&&xml.status==200){
                success(xml.responseText);
            }
        }
        xml.send(null)
    }

    //解析轮播数据函数
        function setBannerData(jsonStr){
            var jsonObj = JSON.parse(jsonStr);
            //获取msg属性下的数组
            var msgArr = jsonObj.msg;
            //遍历msg数组，获取msg下的每个对象
            for(var i in msgArr){
                //获取图片地址
                var imgUrl = msgArr[i].imgUrl;
                var imgTag = document.createElement('img');
                //给每个img设置src属性
                imgTag.setAttribute('src',imgUrl);

                //获取href
                var href = msgArr[i].href;
                var aTag = document.createElement('a');
                aTag.setAttribute('href',href);

                //把每个imgTag拼接进每个aTag里
                aTag.appendChild(imgTag);

                //把4个aTag添加进class名为lunbo-pic里
                var lunboPic = document.getElementsByClassName('lunbo-pic')[0];
                lunboPic.appendChild(aTag);

        }

    }

    ajax('http://192.168.191.1:8888/getBanner','',setBannerData);

    //解析菜单数据
        function setMenuData(jsonStr){
            var jsonObj = JSON.parse(jsonStr);
            var msgArr = jsonObj.msg;
            for(var i in msgArr){
                var  dataObj = msgArr[i];
                //创建每个li的h2标签
                var liTitle = $('<h2 class="li-h2"></h2>');
                liTitle.text(dataObj.title);
                $('.banner-nav-li').eq(i).append(liTitle);

                //创建p标签并拼接进li中
                var $p = $("<p></p>");
                $('.banner-nav-li').eq(i).append($p);
                //获取每个li的h2标签下的城市
                var mainCityArr = dataObj.mainCity;
                for(var m in mainCityArr){
                    //给每个城市包裹一个a标签，并把a拼接进p中
                    var a = '<a href="#">'+mainCityArr[m]+'</a>';
                    $p.append(a);
                    //方法二
//                    var $mainCity = $('<a href="#"></a>');
//                    $mainCity.text(mainCityArr[m]);
//                    $p.append($mainCity);
                }
                //每个category-place区块
                var moreCityArr = dataObj.moreCity;
                //给第六个模块单独解析
                if(moreCityArr.length==1){
                    for(var c in moreCityArr){
                        var moreCityObj = moreCityArr[c];
                        var cityName = moreCityObj.cityName;
                        var $h2 = $('<h2></h2>');
                        $h2.text(cityName);
                        $('.picture').append($h2);
                        var $ul = $('<ul></ul>');
                        $('.picture').append($ul);
                        var itemsArr = moreCityObj.items;
                        for(var j in itemsArr){
                            var itemsObj = itemsArr[j];
                            var $img = $('<img/>');
                            $img.attr('src',itemsObj);
                            var $a = $('<a></a>');
                            $a.append($img);
                            var $li = $('<li></li>');
                            $li.append($a);
                            $ul.append($li);
                        }

                    }
                }
                //获取每个li下的category-place区块
                var cp = $('.banner-nav-li').eq(i).find('.category-place');
                for(var c in moreCityArr){
                    var moreCityObj = moreCityArr[c];
                    var cityName = moreCityObj.cityName;
                    //创建每个区块的h2标签并拼进去
                    var $h2 = $('<h2></h2>');
                        $h2.text(cityName);
                        cp.eq(c).append($h2);
                    //创建每个区块的ul标签并拼进去
                    var $ul = $('<ul></ul>');
                        cp.eq(c).append($ul);
                    //遍历ul下的内容
                    var itemsArr = moreCityObj.items;
                    for(var j in itemsArr){
                        var itemsObj = itemsArr[j];
                        var aItem = '<a href="#">'+itemsObj+'</a>';
                        var liItem = $('<li></li>');
                        liItem.append(aItem);
                        $ul.append(liItem);
                    }

                }
                //设置每个banner-nav-content的图片
                var moreCityImg = dataObj.moreCityImg;
                var cpp = $('.banner-nav-li').eq(i).find('.category-place-pic');
                var $img = $('<img/>');
                $img.attr('src',moreCityImg);
                cpp.append($img);



            }
        }

    ajax('http://192.168.191.1:8888/getMenu','',setMenuData);

    //解析自由行数据
        function setFreeWalkData(jsonStr){
            var jsonObj = JSON.parse(jsonStr);
            var msgArr = jsonObj.msg;
            for(var i in msgArr){
                var msgObj = msgArr[i];

                //选项卡，li
                /*var a = '<a href="#">'+msgObj.title+'</a>';
                var $li = $('<li></li>');
                $li.append(a);
                $('.free-title-ul').append($li);*/
                $('<li></li>').append($("<a href='#'></a>").text(msgObj.title)).appendTo($('.free-title-ul'));

                //创建详细 div，加入到ziyouxing-content中
                var div = ($("<div></div>").addClass('free-wrap-content')).appendTo($(".ziyouxing-content"));

                for(var j in msgObj.data){

                    var dataObj = msgObj.data[j];
                        //字符串拼接法 此法最简便
                        div.append(
                        '<dl class="content">'+
                            '<a href="#">'+
                                '<dt>'+
                                    '<img class= "pic" src="'+dataObj.imgUrl+'"/>'+
                                    '<div class="infos">'+
                                        '<p class="type">机+酒</p>'+
                                        '<p class="price"><em>'+dataObj.price+'</em>元起</p>'+
                                    '</div>'+
                                '</dt>'+
                                '<dd class="titles">'+
                                    '<h3 class="title">'+dataObj.title+'</h3>'+

                                '</dd>'+
                            '</a>'+
                        '</dl>'
                        )

                    //链式创建法 从外创到内
//                    $("<dl></dl>")
//                    .addClass('content')
//                    .append(
//                        $("<a></a>")
//                        .append(
//                            $("<dt></dt>")
//                            .append(
//                                $("<img>").addClass('pic').attr('src',dataObj.imgUrl)
//                            )
//                            .append(
//                                $("<div></div>")
//                                .addClass('infos')
//                                .append(
//                                    $("<p></p>").addClass('type').text('机+酒')
//                                )
//                                .append(
//                                    $('<p></p>').addClass('price').html('<em>'+dataObj.price+'</em>元起')
//                                )
//                            )
//                        )
//                        .append(
//                            $("<dd></dd>")
//                            .addClass('titles')
//                            .append(
//                                $("<h3></h3>").addClass('title').text(dataObj.title)
//                            )
//                            .append(
//                                $("<p></p>").addClass('time').text(dataObj.time)
//                            )
//                        )
//
//                    ).appendTo(div);

                      //只换内容法 此法不可取
//                    var dataObj = msgObj.data[j];
//                    var title = dataObj.title;
//                    var time = dataObj.time;
//                    var price = dataObj.price;
//                    var imgUrl = dataObj.imgUrl;
//                    //获取每一个free-wrap-content
//                    var $freeContent = $('.free-wrap-content').eq(i);
//                    //获取每一个free-wrap-content下的每一个content
//                    var $content = $freeContent.find('.content');
//                    //遍历content
//                    var $cons = $content.eq(j);
//                    var $title = $cons.find('.title');
//                    $title.text(title);
//                    var $price = $cons.find('.price');
//                    $price.html('<em>'+price+'</em>元起');
//                    var $time = $cons.find('.time');
//                    $time.text(time);
//                    var $imgUrl = $cons.find('.pic');
//                    $imgUrl.attr('src',imgUrl);
                }


                //创建查看更多 dl
                $('<div></div>')
                    .addClass('more')
                    .append(
                        $('<div></div>')
                            .addClass('titles')
                            .append(
                                $('<a></a>')
                                    .append(
                                        $('<p></p>').addClass('title').html('查看更多<br>机酒自由行产品')
                                )
                                    .append(
                                        $('<img>').attr('src','img/more.png')
                                )
                        )
                    )
                    .append(
                        $('<p></p>')
                            .addClass('list')
                            .append('<a href="#">机票</a>|')
                            .append('<a href="#">酒店</a>|')
                            .append('<a href="#">机+酒</a>|')
                            .append('<a href="#">邮轮</a>')


                ).appendTo(div);

            }
        }

    ajax('http://192.168.191.1:8888/getFreeWalk','',setFreeWalkData);

   //解析城市行数据
       function setCityWalkData(jsonstr){
           console.log(jsonstr)
           var jsonObj = JSON.parse(jsonstr);
           var msgArr = jsonObj.msg;
           for(var i in msgArr){
               var msgObj = msgArr[i];
               div.append(
                   '<dl class="content">'+
                   '<a href="#">'+
                   '<dt>'+
                   '<img class= "pic" src="'+dataObj.imgUrl+'"/>'+
                   '<div class="infos">'+
                   '<p class="type">机+酒</p>'+
                   '<p class="price"><em>'+dataObj.price+'</em>元起</p>'+
                   '</div>'+
                   '</dt>'+
                   '<dd class="titles">'+
                   '<h3 class="title">'+dataObj.title+'</h3>'+

                   '</dd>'+
                   '</a>'+
                   '</dl>'
               )
               $('<div></div>')
                   .addClass('more')
                   .append(
                       $('<div></div>')
                           .addClass('titles')
                           .append(
                               $('<a></a>')
                                   .append(
                                       $('<p></p>').addClass('title').html('查看更多<br>机酒自由行产品')
                                   )
                                   .append(
                                       $('<img>').attr('src','img/more.png')
                                   )
                           )
                   )
                   .append(
                       $('<p></p>')
                           .addClass('list')
                           .append('<a href="#">机票</a>|')
                           .append('<a href="#">酒店</a>|')
                           .append('<a href="#">机+酒</a>|')
                           .append('<a href="#">邮轮</a>')


                   ).appendTo(div);


           }
       }
   ajax('http://192.168.191.1:8888/getCityWalk','',setCityWalkData);












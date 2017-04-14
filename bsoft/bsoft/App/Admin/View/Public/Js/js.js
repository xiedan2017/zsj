function del(obj){
    $(".tip").fadeIn(200);
    var link  = $(obj).attr('src');
    $(".tiptop a").click(function(){
        $(".tip").fadeOut(200);
    });
     $(".sure").click(function(){
       $(".tip").fadeOut(100);
       window.location.href="http://"+location.host+link;
    });
    $(".cancel").click(function(){
       $(".tip").fadeOut(100);
    });
}
function update(obj){
    var link  = $(obj).attr('src');
    window.location.href="http://"+location.host+link;
}
$(function() {
    //全选  
    $("#selectAll").click(function() {
        $(".tablelist :checkbox,#all").attr("checked", true);
    });
    //全不选
    $("#unSelect").click(function() {
        $(".tablelist :checkbox,#all").attr("checked", false);
    });
    //反选 
    $("#reverse").click(function() {
        $(".tablelist :checkbox").each(function() {
            $(this).attr("checked", !$(this).attr("checked"));
        });
        allCheck();
    });
    function allCheck() {
        var num_all = $(".tablelist :checkbox").size(); //选项总个数
        var num_checked = $(".tablelist :checkbox:checked").size(); //选中个数
        if(num_all == num_checked) { //若选项总个数等于选中个数 
            $(".tablelist").attr("checked", true); //全选选中
        }else{
            $(".tablelist").attr("checked", false);
        }
    }
});
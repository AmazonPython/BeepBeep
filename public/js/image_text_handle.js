function fun(obj){
    var setPopsWidth=$(".setPops").width();
    $(".setPops, .filterPop").fadeIn();
    $(".setPops").css({height:setPopsWidth,marginTop:-setPopsWidth/2+"px"});
    $(".setPops").children("img")[0].src=obj.src;
}
function toHide() {
    $(".setPops, .filterPop").fadeOut()
}
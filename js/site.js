$(document).ready(function () {
    var w = document.body.clientWidth;
    if(w > 768){
        var client_h=$('#boss').height();
        $('#left').height(client_h);
        $('#right').height(client_h);
        $('#centers').height(client_h);
    }else{
        var left = $('#left').detach();
        var centers = $('#centers').detach();

        $('#aaa').prepend(left);
        $('#aaa').prepend(centers);
    }
});

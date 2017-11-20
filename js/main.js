//var cnt = 0;

function fnc_select(id)
{

    //cnt ++;

    //if(cnt < 3){
    $("#img"+id)
        .attr("src","images/seat_1.gif")
        .attr("onClick","fnc_release('"+id+"')")
        .attr("alt","選択した席");
    //}else{
        //alert("6席まで選択可能です。");
    //}
}

function fnc_release(id)
{
    //cnt --;

    $("#img"+id)
        .attr("src","images/seat_0.gif")
        .attr("onClick","fnc_select('"+id+"')")
        .attr("alt","空席（購入可能）");
}

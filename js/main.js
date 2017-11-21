var seatCnt = 0;

$(function(){
    $(".go_select_ticket").on("click",function(){
        if(seatCnt == 0){
            alert("座席選択数が0です。");
        }else{
            $(".select_seat_form").attr("action","select_ticket.php");
        }
    });
})

function fnc_select(id)
{
    if(seatCnt < 6){
    $("#img"+id)
        .attr("src","images/seat_1.gif")
        .attr("onClick","fnc_release('"+id+"')")
        .attr("alt","選択した席");
    seatCnt ++;
    }else{
        alert("選択可能な座席は6席までです。");
    }
}

function fnc_release(id)
{
    seatCnt --;

    $("#img"+id)
        .attr("src","images/seat_0.gif")
        .attr("onClick","fnc_select('"+id+"')")
        .attr("alt","空席（購入可能）");
}

/*** 劇場一覧ページ ***/
//日時計算
var getOfBeforeAfterDays = function(dateObj, number) {
    var result = false;
    if (dateObj && dateObj.getTime && number && String(number).match(/^-?[0-9]+$/)) {
        result = new Date(dateObj.getTime() + Number(number) * 24 * 60 * 60 * 1000);
    }
    return result;
};
//劇場コード
var theNum = "";

/*** 座席予約ページ ***/
//座席数
var seatCnt = 0;

$(function(){

    if(location.href.indexOf("select_seat") != -1){
        if(document.referrer.indexOf("select_ticket") == -1){
            console.log("true");
            window.sessionStorage.setItem(['ssSeatCnt'],[0]);
        }else{
            console.log("false");
            seatCnt = window.sessionStorage.getItem(['ssSeatCnt']);
        }
    }

    $(".go_select_ticket").on("click",function(){
        window.sessionStorage.setItem(['ssSeatCnt'],[seatCnt]);
        if(seatCnt == 0){
            alert("座席選択数が0です。");
        }else{
            $(".select_seat_form").attr("action","select_ticket.php");
        }
    });

    $(".transition_cinema_schedule").on("click",function(){
        $("form").attr("action","../cinema_schedule.php");
    });

    //オンライン予約パンくずリスト
    if(location.href.indexOf("select_seat") != -1){
        $(".ticket_header_breadcrumbs_list1").addClass("ticket_header_breadcrumbs_now");
    }
    if(location.href.indexOf("select_ticket") != -1){
        $(".ticket_header_breadcrumbs_list1").addClass("ticket_header_breadcrumbs_now");
    }
    if(location.href.indexOf("user_info") != -1){
        $(".ticket_header_breadcrumbs_list2").addClass("ticket_header_breadcrumbs_now");
    }
    if(location.href.indexOf("pay_info") != -1){
        $(".ticket_header_breadcrumbs_list3").addClass("ticket_header_breadcrumbs_now");
    }
    if(location.href.indexOf("chk") != -1){
        $(".ticket_header_breadcrumbs_list4").addClass("ticket_header_breadcrumbs_now");
    }
    if(location.href.indexOf("ex") != -1){
        $(".ticket_header_breadcrumbs_list5").addClass("ticket_header_breadcrumbs_now");
    }

    //劇場コード取得
    theNum = $(".cinema_schedule_ttl_num").text();

    var yb=["日","月","火","水","木","金","土"];

    today = new Date();

    day1 = today;
    var day1_year = day1.getFullYear();
    var day1_month = keta(day1.getMonth()+1);
    var day1_day = keta(day1.getDate());
    var day1_day_of_week = day1.getDay();
    var day1_hour = keta(day1.getHours());
    var day1_minutes = keta(day1.getMinutes());
    $(".day1_month").html(day1_month);
    $(".day1_day").html(day1_day);
    $(".day1_day_of_week").html(yb[day1_day_of_week]);

    day2 = getOfBeforeAfterDays(today,1);
    var day2_year = day2.getFullYear();
    var day2_month = keta(day2.getMonth()+1);
    var day2_day = keta(day2.getDate());
    var day2_day_of_week = day2.getDay();
    var day2_hour = keta(day2.getHours());
    var day2_minutes = keta(day2.getMinutes());
    $(".day2_month").html(day2_month);
    $(".day2_day").html(day2_day);
    $(".day2_day_of_week").html(yb[day2_day_of_week]);

    day3 = getOfBeforeAfterDays(today,2);
    var day3_year = day3.getFullYear();
    var day3_month = keta(day3.getMonth()+1);
    var day3_day = keta(day3.getDate());
    var day3_day_of_week = day3.getDay();
    var day3_hour = keta(day3.getHours());
    var day3_minutes = keta(day3.getMinutes());
    $(".day3_month").html(day3_month);
    $(".day3_day").html(day3_day);
    $(".day3_day_of_week").html(yb[day3_day_of_week]);

    day4 = getOfBeforeAfterDays(today,3);
    var day4_year = day4.getFullYear();
    var day4_month = keta(day4.getMonth()+1);
    var day4_day = keta(day4.getDate());
    var day4_day_of_week = day4.getDay();
    var day4_hour = keta(day4.getHours());
    var day4_minutes = keta(day4.getMinutes());
    $(".day4_month").html(day4_month);
    $(".day4_day").html(day4_day);
    $(".day4_day_of_week").html(yb[day4_day_of_week]);

    day5 = getOfBeforeAfterDays(today,4);
    var day5_year = day5.getFullYear();
    var day5_month = keta(day5.getMonth()+1);
    var day5_day = keta(day5.getDate());
    var day5_day_of_week = day5.getDay();
    var day5_hour = keta(day5.getHours());
    var day5_minutes = keta(day5.getMinutes());
    $(".day5_month").html(day5_month);
    $(".day5_day").html(day5_day);
    $(".day5_day_of_week").html(yb[day5_day_of_week]);

    day6 = getOfBeforeAfterDays(today,5);
    var day6_year = day6.getFullYear();
    var day6_month = keta(day6.getMonth()+1);
    var day6_day = keta(day6.getDate());
    var day6_day_of_week = day6.getDay();
    var day6_hour = keta(day6.getHours());
    var day6_minutes = keta(day6.getMinutes());
    $(".day6_month").html(day6_month);
    $(".day6_day").html(day6_day);
    $(".day6_day_of_week").html(yb[day6_day_of_week]);

    day7 = getOfBeforeAfterDays(today,6);
    var day7_year = day7.getFullYear();
    var day7_month = keta(day7.getMonth()+1);
    var day7_day = keta(day7.getDate());
    var day7_day_of_week = day7.getDay();
    var day7_hour = keta(day7.getHours());
    var day7_minutes = keta(day7.getMinutes());
    $(".day7_month").html(day7_month);
    $(".day7_day").html(day7_day);
    $(".day7_day_of_week").html(yb[day7_day_of_week]);

    $.ajax({
        type: 'GET',
        url: 'cinema_schedule_json.php',
        dataType: 'json',
        data: {
            "the_num":theNum
        },
        success: function(data){
            console.log("json取得成功");
            $(".theater_name").html(data[0].the_name);
        }
    });
});

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
        $("#"+id).prop('checked', true);
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

function keta(suuji){
    if(suuji<10){
        suuji="0"+suuji;
    }
    return suuji;
}

/*
function dataRead(data){
    for(var i in data){
        example[cnt] = data[i].example;
        cnt ++;
    }
*/

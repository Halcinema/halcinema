//グローバル変数の定義
//var 変数名=初期値;

var getOfBeforeAfterDays = function(dateObj, number) {
    var result = false;
    if (dateObj && dateObj.getTime && number && String(number).match(/^-?[0-9]+$/)) {
        result = new Date(dateObj.getTime() + Number(number) * 24 * 60 * 60 * 1000);
    }
    return result;
};

//この領域はbody内読み込み前に読み込むので、ここにbody内についてのプログラムは記述不可

$(function(){
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
        type: 'POST',
        url: 'cinema_schedule_json.php',
        dataType: 'json',
        success: function(data){
            console.log("json取得成功");
            /*
            var len = json.length;
            for(var i=0; i < len; i++){
                $("body").append(json[i].version + ' ' + json[i].codename + '<br>');
            }
            */
        }
    });
});

/*
var flag=0;//flagが0なら24時間

function time12(){
    flag=1;
}

function time24(){
    flag=0;
}

$(function(){
    timerFunc();
});

function timerFunc(){
    var yb=["日","月","火","水","木","金","土"];

    now=new Date();
    $("#nen").html(now.getFullYear());
    $("#tuki").html(keta(now.getMonth()+1));
    $("#hi").html(keta(now.getDate()));
    $("#yobi").html(yb[now.getDay()]);
    if(flag==0){
        $("#ji").html(keta(now.getHours()));
    }else{
        if(now.getHours()<12){
            $("#ji").html("AM "+keta(now.getHours()));
        }else{
            $("#ji").html("PM "+keta(now.getHours()-12));
        }
    }
    $("#fun").html(keta(now.getMinutes()));
    $("#byo").html(keta(now.getSeconds()));

    setTimeout("timerFunc()",1000);
}
*/
function keta(suuji){
    if(suuji<10){
        suuji="0"+suuji;
    }
    return suuji;
}

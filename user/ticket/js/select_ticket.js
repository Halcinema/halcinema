//グローバル変数定義
var seat = new Array();

function fnc_login(){
    $("#status").attr("value","0");
}

function fnc_logout(){
    $("#status").attr("value","2");
}

function fnc_session(cnt)
{
    for(i=1; i<4; i++){
        seat[i] = $("seat"+1).name();
    }
}
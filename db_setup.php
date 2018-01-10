<?php
$pageTitle = "Database Setup Program";
if(isset($_GET["setup"])){
print "<span class='start_or_finish'>**********DB構築処理開始**********</span><br />";
include($_SERVER['DOCUMENT_ROOT']."/halcinema/user/mysqlenv.php");

if(!$Link = mysqli_connect($HOST,$USER,$PASS)){
    exit("<span class='err'>エラー：MySQL接続エラー<br />".mysqli_connect_error()."</span>");
}else{
    print "成功：MySQL接続<br />";
}

$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
    exit("<span class='err'>エラー：MySQL（文字コード設定）クエリー送信エラー<br />".$SQL."</span>");
}else{
    print "成功：utf8文字コード設定<br />";
}

if(!mysqli_select_db($Link,$DB)){
    exit("MySQLデータベース選択エラー<br />" . $DB);
}else{
    print "成功：データベース選択<br />";
}

print "**********テーブル構築処理開始**********<br />";

$SQL = "drop table if exists t_member";
if(!$SqlRes = mysqli_query($Link,$SQL)){
    print "MySQLクエリー送信エラー<br />".mysqli_error($Link)."<br />".$SQL;
}

$SQL = "create table t_member(
mem_mail varchar(100) not null primary key,
mem_pass varchar(20) not null,
mem_fk varchar(10) not null,
mem_gk varchar(10) not null,
mem_ff varchar(10) not null,
mem_gf varchar(10) not null,
mem_sex char(1) not null,
mem_birth date not null,
mem_post char(8) not null,
mem_pref varchar(4) not null,
mem_city varchar(20) not null,
mem_add varchar(20),
mem_tel varchar(15) not null,
mem_reg datetime not null
)";

if(!$SqlRes = mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
}else{
    print "成功：会員テーブル作成<br />";
}

$SQL = "drop table if exists t_theater";
if(!$SqlRes = mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
}

$SQL = "create table t_theater(
the_num char(1) not null primary key,
the_name varchar(50) not null,
the_open time not null,
the_close time not null,
the_post char(8) not null,
the_pref varchar(4) not null,
the_city varchar(20) not null,
the_add varchar(20)
)";

if(!$SqlRes = mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
}else{
    print "成功：劇場テーブル作成<br />";
}

print "**********テーブル構築処理終了**********<br />";
print "**********データ挿入処理開始**********<br />";

$SQL = "insert into t_member values(
'test@hal.ac.jp',
'test',
'春',
'太郎',
'ハル',
'タロウ',
'1',
'2000-01-01',
'111-1111',
'愛知県',
'名古屋市',
'X番地',
'1111001111',
now()
)";

if(!$SqlRes = mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />" . mysqli_error($Link) . "<br />" . $SQL);
}else{
    print("成功：会員テーブルへのデータ挿入<br />");
}

print "**********データ挿入処理終了**********<br />";

if(!mysqli_close($Link)){
    exit("MySQL切断エラー");
}else{
    print "成功：MySQL切断<br />";
}
print "<span class='start_or_finish'>**********DB構築処理終了**********</span><br />";
}
?>
<!DOCTYPE html>
<?php include($_SERVER['DOCUMENT_ROOT']."/halcinema/head.php"); ?>
<body>
    <h1>Database Setup Program</h1>
    <a href="/halcinema/db_setup.php?setup=start">構築実行</a>
</body>
<style>
.start_or_finish {
    color: #0000ff;
}
.err {
    color: #ff0000 !important;
}
</style>
</html>

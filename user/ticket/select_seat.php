<?php include("../login_session.php");
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "座席選択 | 予約";
$ShowId = "";

if(isset($_GET["ShowId"])){
    $_SESSION["showId"] = $_GET["ShowId"];
    //劇場選択ページから来た場合は座席情報をリセット
    unset($_SESSION["seats"]);
}
$ShowId = $_SESSION["showId"];

include("../mysqlenv.php");

if(!$Link = mysqli_connect($HOST,$USER,$PASS)){
    exit("MySQL接続エラー<br />".mysqli_connect_error());
}

$SQL = "set names utf8";
if(!mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />".$SQL);
}

if(!mysqli_select_db($Link,$DB)){
    exit("MySQLDB選択エラー<br />".$DB);
}

$SQL = "select * from t_theater, t_screen, t_show, t_scon, t_movie";
$SQL .= " where t_show.show_id='".$ShowId."' and t_show.show_id = t_scon.show_id and t_show.scr_id = t_screen.scr_id and t_theater.the_num = t_screen.the_num and t_show.movie_num = t_movie.movie_num";
if(!$SqlRes = mysqli_query($Link,$SQL)){
    exit("MySQLクエリー送信エラー<br />".mysqli_error($Link) . "<br />" .$SQL);
}

$Row = mysqli_fetch_array($SqlRes);

$NumRow = mysqli_num_rows($SqlRes);

mysqli_free_result($SqlRes);

if(!mysqli_close($Link)){
    exit("MySQL切断エラー");
}

if($NumRow == 0){
    $errMsg .= "指定上映IDに該当する席状況データが見つかりませんでした。<br />";
    $errFlg = "true";
}

for($i=0; $i<10; $i++){
    for($j=1; $j<21; $j++){
        if(isset($_SESSION["seats"])){
            foreach($_SESSION["seats"] as $pointer => $value){
                if($pointer == chr(65+$i).$j){
                    $Row[chr(65+$i).$j] = "1";
                }
            }
        }
    }
}
$arrTicketStatus["movie_name"] = $Row["movie_name"];
$arrTicketStatus["show_enter"] = $Row["show_enter"];
$arrTicketStatus["show_start"] = $Row["show_start"];
$arrTicketStatus["show_finish"] = $Row["show_finish"];
$arrTicketStatus["the_num"] = $Row["the_num"];
$arrTicketStatus["the_name"] = $Row["the_name"];
$arrTicketStatus["scr_name"] = $Row["scr_name"];
$arrTicketStatus["scr_seat"] = $Row["scr_seat"];
$_SESSION["ticket_status"] = $arrTicketStatus;
?>

<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="select_seat">
    <div id="wrapper">
        <?php include("header.php"); ?>
        <div id="contents">
            <div id="left">
                <h2>お好きな座席をお選びください。</h2>
                <div id="icon_des">
                    <h2>アイコン説明</h2>
                    <ul>
                        <li><img src="images/seat_0.gif" width="15" height="22" alt="空席（購入可能）">空席（購入可能）</li>
                        <li><img src="images/seat_1.gif" width="15" height="22" alt="選択した席">選択した席</li>
                        <li><img src="images/seat_2.gif" width="15" height="22" alt="購入済み／販売対象外">購入済み／販売対象外</li>
                    </ul>
                </div>
                <form class="select_seat_form" action="javascript:void(0);" method="post">
                <h3><?php print $_SESSION["ticket_status"]["scr_name"]; ?></h3>
                <div id="select_seat_area_out">
                    <div id="select_seat_area_in">
                        <table>
                            <tr>
                                <th></th>
                                <th>1</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>20</th>
                            </tr>
                            <?php for($i=0; $i<10; $i++){ ?>
                            <tr>
                                <th><?php print chr(65+$i); ?></th>
                                <?php for($j=1; $j<21; $j++){ ?>
                                <td>
                                    <?php if($Row[chr(65+$i).$j] == "0" || $Row[chr(65+$i).$j] == "1"){ ?>
                                        <label for="<?php print chr(65+$i).$j; ?>">
                                        <input id="<?php print chr(65+$i).$j; ?>" type="checkbox" name="selected[]" value="<?php print chr(65+$i).$j; ?>" <?php if($Row[chr(65+$i).$j] == "1"){ print "checked='checked'"; } ?> />
                                    <?php } ?>
                                    <img id="img<?php print chr(65+$i).$j; ?>" src="images/seat_<?php
                                            print $Row[chr(65+$i).$j];
                                    ?>.gif" width="15" height="22" alt="<?php
                                        if($Row[chr(65+$i).$j] == "0"){
                                            print "空席（購入可能）";
                                        }else if($Row[chr(65+$i).$j] == "1"){
                                            print "選択した席";
                                        }else if($Row[chr(65+$i).$j] == "2"){
                                            print "購入済み／販売対象外";
                                        }
                                    ?>" <?php
                                        if($Row[chr(65+$i).$j] == "0"){
                                            print "onClick=\"fnc_select('".chr(65+$i).$j."');\"";
                                        }else if($Row[chr(65+$i).$j] == "1"){
                                            print "onClick=\"fnc_release('".chr(65+$i).$j."');\"";
                                        }
                                    ?>/>
                                    <?php if($Row[chr(65+$i).$j] == "0"){ ?>
                                    </label>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
                <div id="fac">
                    <h2>映画館の設備</h2>
                    <table border="1">
                        <tr width="700"><th width="500">座席数</th><th width="200">設備・音響</th></tr>
                        <tr><td><?php print $_SESSION["ticket_status"]["scr_seat"]; ?></td><td>〇〇〇〇</td></tr>
                    </table>
                </div>
                <div id="terms">
                    <h2>利用規約</h2>
                    <iframe src="terms.html" width="700" height="200"></iframe>
                </div>
                    <input type="hidden" name="the_num" value="<?php print $_SESSION["ticket_status"]["the_num"]; ?>">
                    <input id="next" class="ticket-form__submit ticket-form__submit--blue go_select_ticket" type="submit" name="next" value="利用規約に同意して次へ" />
                    <input id="back" class="transition_cinema_schedule" type="submit" name="back" value="時間指定画面へ戻る" />
                </form>
            </div>
            <div class="right">
                <div class="ticket_status">
                    <h2>ご購入内容</h2>
                    <dl>
                        <dt>作品</dt>
                        <dd><?php print $_SESSION["ticket_status"]["movie_name"]; ?></dd>
                        <dt>入場可能日時</dt>
                        <dd><?php print $_SESSION["ticket_status"]["show_enter"]; ?></dd>
                        <dt>上映開始日時</dt>
                        <dd><?php print $_SESSION["ticket_status"]["show_start"]; ?></dd>
                        <dt>上映終了日時</dt>
                        <dd><?php print $_SESSION["ticket_status"]["show_finish"]; ?></dd>
                        <dt>劇場</dt>
                        <dd><?php print $_SESSION["ticket_status"]["the_name"]; ?></dd>
                    </dl>
                </div>
            </div>
        </div><!-- /#contents -->
        <footer class="ticket_footer">
            <p class="ticket_footer_ttl">Copyright &copy; 2017 halcinema</p>
        </footer>
    </div><!-- /#wrapper -->
</body>
</html>

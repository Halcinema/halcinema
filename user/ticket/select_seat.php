<?php
header("Content-Type:text/html; charset=UTF-8");
$pageTitle = "座席選択 | 予約";

//エラーフラグ（初期値：エラー無し）
$errFlg = "false";

//エラーメッセージ
$errMsg = "";

//上映ID変数宣言
//プレゼン用データ宣言
//halcinema東京スクリーン1-2017年07月14日20時00分上映開始
$ShowId = "";

if(isset($_GET["ShowId"])){
    $ShowId = $_GET["ShowId"];
}

if(isset($_SESSION["showId"])){
    $ShowId = $_SESSION["showId"];
}
    //  MySQL関連変数を外部ファイルで持たせる
    //  外部ファイルの読み込み
    include("../mysqlenv.php");

    //  MySQLとの接続開始
    if(!$Link = mysqli_connect
                ($HOST,$USER,$PASS)){
      //  うまく接続できなかった
      exit("MySQL接続エラー<br />" .
        mysqli_connect_error());
    }

    //  クエリー送信(文字コード)
    $SQL = "set names utf8";
    if(!mysqli_query($Link,$SQL)){
      //  クエリー送信失敗
      exit("MySQLクエリー送信エラー<br />" .
            $SQL);
    }

    //  MySQLデータベース選択
    if(!mysqli_select_db($Link,$DB)){
      //  MySQLデータベース選択失敗
      exit("MySQLデータベース選択エラー<br />" .
            $DB);
    }

    //1件目の抽出処理
    //  クエリー送信(選択クエリー)
    $SQL = "select * from t_scon where show_id='".$ShowId."'";
    if(!$SqlRes = mysqli_query($Link,$SQL)){
      //  クエリー送信失敗
      exit("MySQLクエリー送信エラー<br />" .
            mysqli_error($Link) . "<br />" .
            $SQL);
    }

    //  連想配列への抜出（先頭行）
    $Row = mysqli_fetch_array($SqlRes);

    //  抜き出されたレコード件数を求める
    $NumRow = mysqli_num_rows($SqlRes);

    //  MySQLのメモリ解放(selectの時のみ)
    mysqli_free_result($SqlRes);

    //  MySQLとの切断
    if(!mysqli_close($Link)){
      exit("MySQL切断エラー");
    }

    if($NumRow == 0){
        $errMsg .= "指定上映IDに該当する席状況データが見つかりませんでした。<br />";
        $errFlg = "true";
    }

?>

<!DOCTYPE html>
<html lang="ja">
<?php include("../../head.php"); ?>
<body class="select_seat">
    <div id="wrapper">
      <div id="contents">
            <p class="ticket_breadcrumbs"><span id="now" class="pan_padding">座席・チケット選択</span><span>&gt;</span><span class="pan_padding">ご購入者情報の入力</span><span>&gt;</span><span class="pan_padding">お支払情報の入力</span><span>&gt;</span><span class="pan_padding">購入内容の確認</span><span>&gt;</span><span class="pan_padding">購入完了</span></p>
            <div id="left">
                <h1>お好きな座席をお選びください。</h1>
                <div id="icon_des">
                    <h2>アイコン説明</h2>
                    <ul>
                        <li><img src="images/seat_0.gif" width="15" height="22" alt="空席（購入可能）">空席（購入可能）</li>
                        <li><img src="images/seat_1.gif" width="15" height="22" alt="選択した席">選択した席</li>
                        <li><img src="images/seat_2.gif" width="15" height="22" alt="購入済み／販売対象外">購入済み／販売対象外</li>
                    </ul>
                </div>
                <form method="post" action="select_ticket.php">
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
                                        <input id="<?php print chr(65+$i).$j; ?>" type="checkbox" name="selected[]" value="<?php print chr(65+$i).$j; ?>" />
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
                                        }else if($Row[chr(65+$i).$i] == "1"){
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
                        <tr><td>XX席+X車いす席</td><td>〇〇〇〇</td></tr>
                    </table>
                </div>
                <div id="terms">
                    <h2>利用規約</h2>
                    <iframe src="terms.html" width="700" height="200"></iframe>
                </div>
                    <input type="hidden" name="ShowId" value="<?php print $ShowId; ?>" />
                    <input id="next" type="submit" name="next" value="利用規約に同意して次へ" />
                </form>
                <form>
                    <input id="back" type="submit" name="back" value="時間指定画面へ戻る" />
                </form>
            </div>
            <div id="right">
                <div id="purchase_contents">
                    <h2>ご購入内容</h2>
                    <dl>
                        <dt>作品</dt>
                        <dd>〇〇〇〇</dd>
                        <dt>日時</dt>
                        <dd>XXXX年XX月XX日(X)<br>XX:XX~XX:XX</dd>
                        <dt>劇場</dt>
                        <dd>〇〇〇〇</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

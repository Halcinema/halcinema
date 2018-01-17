<?php include ("login_session.php"); ?>



<?php
/*-----------------------------------------------------------------------------
  概要      :
            :
  作成者    :
  作成日    :
  更新履歴  :
-----------------------------------------------------------------------------*/
//  HTTPヘッダーで文字コードを指定

//処理部

/*
if(isset($_POST["house_num"])){
    $house_num = $_POST["house_num"];

*/


//  MySQL関連変数を外部ファイルで持たせる
//  外部ファイルの読み込み
include("mysqlenv.php");

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


//  クエリー送信(選択クエリー)
$GO = "select * from t_goods";
if(!$GoSqlRes = mysqli_query($Link,$GO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $GO);
}

$FO = "select * from t_foods";
if(!$FoSqlRes = mysqli_query($Link,$FO)){
  //  クエリー送信失敗
  exit("MySQLクエリー送信エラー<br />" .
        mysqli_error($Link) . "<br />" .
        $FO);
}

//  連想配列への抜出（全件配列に格納）
while($GoRow = mysqli_fetch_array($GoSqlRes)){
  //  データが存在する間処理される
  $GoRowAry[] = $GoRow;
}
//  連想配列への抜出（全件配列に格納）
while($FoRow = mysqli_fetch_array($FoSqlRes)){
  //  データが存在する間処理される
  $FoRowAry[] = $FoRow;
}
//  抜き出されたレコード件数を求める
$GoNumRows = mysqli_num_rows($GoSqlRes);

//  抜き出されたレコード件数を求める
$FoNumRows = mysqli_num_rows($FoSqlRes);

//  MySQLのメモリ解放(selectの時のみ)
mysqli_free_result($GoSqlRes);

//  MySQLとの切断
if(!mysqli_close($Link)){
  exit("MySQL切断エラー");
}


?>




<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
<link href="css/common.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/sub_common.css" rel="stylesheet" type="text/css" />
<link href="css/service.css" rel="stylesheet" type="text/css" />
<title>サービス案内</title>
</head>
<?php 
    include("header.php"); ?>
<body>
    <div id="wrapper">
    <ul style="display: flex;">
<a href="service.php" class="service_button" id="now"><li>サービス案内>></li></a><a href="ticket.php" class="service_button"><li>チケット案内>></li></a><a href="access.php" class="service_button"><li>アクセス方法・駐車場情報>></li></a>
	</ul>
<h1 class="page_name" style="line-height: 30px;">サービス案内</h1>
<section class="clearfix">
<ul id="goods_info">
    <li style="background-image:url(images/consession.jpg);">
        <h4 class="info_name">コンセッション</h4>
        <p>&nbsp;&nbsp;映画の定番ポップコーンやフィッシュ＆チップスなど、豊富なフード・ドリンクをご用意しています。上映開始までの時間はロビー内のカフェコーナーで、ゆっくり寛いでお召し上がりください。また、映画の予約の際に一緒に注文すると、店頭で受けとれ、割引になります。</p>
    </li>
    <li style="background-image:url(images/store.jpg);">
        <h4 class="info_name">ストア</h4>
        <p>&nbsp;&nbsp;各映画のパンフレット・キャラクターグッズ、ＤＶＤやサウンドトラックなど充実した品揃えでお待ちしております。また、各種映画の前売券もこちらで取り扱っております。商品情報もぜひご覧ください。</p>
    </li>
</ul>
    
<h2 class="contents_name" id="service-mokuji">目次</h2>
    
        <ul class="page_link">
            <a href="#service-osusume"><li>おすすめ情報</li></a>
            <a href="#service-food"><li>フード情報</li></a>
            <a href="#service-goods"><li>グッズ情報</li></a>
            <a href="#service-free-rental"><li>無料貸し出しサービス</li></a>
            <a href="#service-manner"><li>鑑賞マナー向上への取り組み</li></a>
        </ul>

<h2 class="contents_name" id="service-osusume">おすすめ情報</h2>
    
<ul class="topic">
    <a href="#"><li>
            <img src="images/lemonade.jpg" width="400px">
            <p>
                シュワッとおいしい！<br>プレミアムソーダ・レモネード販売中！
            </p>
    </li></a>
    <a href="#"><li>
            <img src="images/mango.jpg" width="400px">
            <p>
                GODIVAから期間限定！<br>ショコリキサー販売中！
            </p>
    </li></a>
</ul>
    
    
    
<h2 class="contents_name" id="service-food">フード</h2>
画像にマウスカーソルを合わせるかタッチをすると説明が表示されます。
<div id="food_list_frame">
    <h3>商品一覧</h3>
<ul id="foods_list">
    <li aria-haspopup="true">
        <div class="message-function">
        <div class="message">
            <!--<?php print $GoRowAry[$i]["goods_detail"]; ?>-->
            人気商品です<br>
            Rサイズ/Lサイズから選べます。
        </div>
        <img src="images/food/cola.jpg">
        </div>
        <h4>
            <!--<?php print $GoRowAry[$i]["goods_name"]; ?>-->コーラ
        </h4>
        <div>
            <!--<?php print $GoRowAry[$i]["goods_detail"]; ?>-->値段
        </div>
        <div>
            <!--<?php print $GoRowAry[$i]["goods_detail"]; ?>-->Rサイズ/Lサイズ
        </div>
    </li>
    <li aria-haspopup="true">
        <div class="message-function">
        <div class="message">
            定番の商品です<br>
            Rサイズ、Lサイズから選べます。
        </div>
        <img src="images/food/popcorn.jpg">
        </div>
        <h4>
            <!--<?php print $GoRowAry[$i]["goods_name"]; ?>-->ポップコーン
        </h4>
        <!--<?php print $GoRowAry[$i]["goods_detail"]; ?>-->値段
    </li>
    <li aria-haspopup="true">
        <div class="message-function">
        <div class="message">
            定番の商品です<br>
            ホットとアイスがあります。
        </div>
        <img src="images/food/coffee.jpg">
        </div>
        <h4>
            <!--<?php print $GoRowAry[$i]["goods_name"]; ?>-->コーヒー
        </h4>
        <!--<?php print $GoRowAry[$i]["goods_detail"]; ?>-->値段
    </li>
    <li aria-haspopup="true">
        
        <div class="message-function">
        <div class="message">
            甘くておいしいお菓子です。<br>
            プレーンとチョコがあります。
        </div>
        <img src="images/food/tyurosu.jpg">
        </div>
        <h4>
            <!--<?php print $GoRowAry[$i]["goods_name"]; ?>-->チュロス
        </h4>
        <!--<?php print $GoRowAry[$i]["goods_detail"]; ?>-->値段
    </li>
    <?php for($i=0;$i<$FoNumRows;$i++){ ?>
    <li aria-haspopup="true">
        
        <div class="message-function">
        <div class="message">
           説明が入ります
        </div>
        <img src="../admin/foods/upload/<?php print $FoRowAry[$i]["foods_img"]; ?>">
        </div>
        <h4>
            <?php print $FoRowAry[$i]["foods_name"]; ?>
        </h4>
        <?php print $FoRowAry[$i]["foods_price"]; ?>円
    </li>
    <?php } ?>
    <!--<p class="shohin_more"><a href="#">商品をもっと見る</a></p>-->
</ul>
</div>
    
    
<!-------------------------------------------------------------------------------------旧フード
<h2 class="contents_name" id="service-food">フード</h2>
    当劇場のコンセッション（売店）でご購入頂いた商品のみシアター内にお持込頂けます。<br>
それ以外の飲食物の持ち込みはご遠慮下さい。
    <div id="food_frame">
    <div id="food_back">
  <div id="goodsbox">
    <div id="leftbox">
      <div class="goodsbox">
        <h3>ソフトドリンク<span class="english">SOFT DRINK</span></h3>
        <ul>
          <li>コカコーラ <span>Rサイズ ／ Lサイズ</span></li>
          <li>コカコーラ ＺＥＲＯ <span>Rサイズ ／ Lサイズ</span></li>
          <li>ジンジャエール <span>Rサイズ ／ Lサイズ</span></li>
          <li>カルピス <span>Rサイズ ／ Lサイズ</span></li>
          <li>Ｆａｎｔａメロンソーダ <span>Rサイズ ／ Lサイズ</span></li>
          <li>Ｆａｎｔａレモンスカッシュ <span>Rサイズ ／ Lサイズ</span></li>
          <li>オレンジ100％ <span>Rサイズ ／ Lサイズ</span></li>
          <li>フルーツミックス100％ <span>Rサイズ ／ Lサイズ</span></li>
          <li>ウーロン茶 <span>Rサイズ ／ Lサイズ</span></li>
          <li>紅茶花伝 アイスティー <span>Rサイズ ／ Lサイズ</span></li>
          <li>ブレンドコーヒー</li>
          <li>アイスコーヒー</li>
          <li>カフェラテ</li>
          <li>アイスラテ</li>
          <li>カフェモカ（アイス／ホット）</li>
          <li>ココア（アイス／ホット）</li>
          <li>緑茶（ホット）</li>
          <li>ミネラルウォーター［555ml／ペットボトル］</li>
        </ul>
      </div>
      <div class="goodsbox">
          <h3>セットメニュー<span class="english">SET MENU</span></h3>
        <ul>
          <li>スタンダードセット <span>ポップコーンLサイズ１つとソフトドリンクR（コーヒー類不可）サイズ1つがセット ポップコーン（塩） ポップコーン（キャラメル）</span></li>
          <li>ペアセット <span>ポップコーンLサイズ１つとソフトドリンクR（コーヒー類不可）2つがセット ポップコーン（塩） ポップコーン（キャラメル）</span></li>
          <li>キングセット <span>ポップコーンKサイズ1つとソフトドリンクL（コーヒー類不可）2つがセット ポップコーン（塩） ポップコーン（キャラメル） ポップコーン　ハーフ＆ハーフ（塩&キャラメル）</span></li>
          <li>フィッシュ＆ポテトセット <span>フィッシュ＆ポテト１つとソフトドリンクR（コーヒー類不可）サイズ1つがセット フィッシュ＆ポテトと生ビール セット ナゲット＆ポテトセット ナゲット＆ポテト１つとソフトドリンクR（コーヒー類不可）サイズ1つがセット</span></li>
          <li>ナゲット＆ポテトと生ビール セット</li>
          <li>ホットドッグ１つとソフトドリンクR</li>
          <li>ホットドッグ１つとコーヒー類</li>
        </ul>
      </div>
    </div>
    <div id="rightbox">
      <div class="goodsbox">
        <ul>
            <h3>アルコール<span class="english">ALCOHOL</span></h3>
          <li>生ビール</li>
        </ul>
      </div>
      <div class="goodsbox">
          <h3>フード<span class="english">FOOD</span></h3>
        <ul>
          <li>ポップコーン(塩) <span>R（レギュラー）サイズ L（ラージ）サイズ K（キング）サイズ</span></li>
          <li>ポップコーン(キャラメル) <span>Rサイズ ／ Lサイズ／ Kサイズ</span></li>
          <li>ポップコーン　<span>ハーフ＆ハーフ（塩＆キャラメル） Kサイズのみ</span></li>
          <li>フライドポテト</li>
          <li>フィッシュ＆ポテト</li>
          <li>ナゲット＆ポテト</li>
          <li>ホットドッグ</li>
        </ul>
      </div>
      <div class="goodsbox">
          <h3>デザート<span class="english">DESSERT</span></h3>
        <ul>
          <li>ワッフル（バター・チョコチップ・メープル）</li>
          <li>チュリトス（シナモン・チョコ）</li>
        </ul>
      </div>
      <div class="goodsbox">
          <?php for($t=0;$t<$FtNumRows;$t++){ ?>
          
          <h3><?php print $FtRowAry[$t]["foods_type_name"]; ?><span class="english">TEST</span></h3>
          
          <?php for($f=0;$f<$FoNumRows;$f++){ ?>
          
          <?php if($FtRowAry[$f]["foods_type_num"] == $FoRowAry[$f]["food_type"]){ ?>
        <ul>
          <li><?php print $FoRowAry[$f]["foods_name"]; ?></li>
        </ul>
          
          
          <?php } ?>
          
          <?php } ?>
          <?php } ?>
          
      </div>
    </div>
  </div>
    </div>
    </div>------------->
    
    <h2 class="contents_name" id="service-goods">グッズ</h2>
    
    <a href="#" style="text-decoration:none;"><p style="color:white;background-color:orange;text-align:center;border-radius:25px;line-height:30px;">HALシネマ公式SHOPはこちら！</p></a>
    
    <p>おすすめ商品の紹介です。</p>
    <ul id="goods_list"><!--
        <li><img src="images/namiya_bana_saisyuu.jpg" width="100%"><h3>ナミヤ雑貨店の奇蹟</h3>&nbsp;&nbsp;東野圭吾史上、最も泣ける感動作。記念のグッズはいかがでしょうか？<a href="#"><div class="shohin_shosai">詳細を見る</div></a></li>
        <li><img src="images/syouchiku_koushiki_bana_gan.jpg" width="100%"><h3>機動戦士ガンダム THE ORIGIN 激突 ルウム会戦</h3>&nbsp;&nbsp;一年戦争の幕開け。シャア、黒い三連星、ギレンをモチーフにしたアイテムが盛りだくさん！<a href="#"><div class="shohin_shosai">詳細を見る</div></a></li>
        <li><img src="images/syochiku_johnnys.jpg" width="100%"><h3>関西ジャニーズJr.のお笑いスター誕生！</h3>&nbsp;&nbsp;まいどおおきに！関連グッズの販売です！<a href="#"><div class="shohin_shosai">詳細を見る</div></a></li>
        <li><img src="images/wonder_wonman.jpg" width="100%"><h3>ワンダーウーマン</h3>&nbsp;&nbsp;史上最強の女性スーパーヒーロー登場！関連グッズも見逃すな！<a href="#"><div class="shohin_shosai">詳細を見る</div></a></li>
        
        <li><img src="images/shochiku_koushiki_HL.jpg" width="100%"><h3>HiGH&LOW THE MOVIE 2 ／ END OF SKY</h3>&nbsp;&nbsp;日本中が熱狂した「HiGH＆LOW」プロジェクト、待望の新作！グッズもGetだ！<a href="#"><div class="shohin_shosai">詳細を見る</div></a></li>
        <li><img src="images/guru.jpg" width="100%"><h3>東京喰種 トーキョーグール</h3>&nbsp;&nbsp;2017年夏。グールグッズ襲来！<a href="#"><div class="shohin_shosai">詳細を見る</div></a></li>
        <li><img src="images/anikoma.jpg" width="100%"><h3>22年目の告白 ―私が殺人犯です―</h3>&nbsp;&nbsp;男の告白に衝撃を受けた後、気記念のグッズはいかがですか？<a href="#"><div class="shohin_shosai">詳細を見る</div></a></li>
        <li><img src="images/shochiku_222bana1.jpg" width="100%"><h3>兄に愛されすぎて困ってます</h3>&nbsp;&nbsp;兄系イケメンズ・フェスティバル開幕！記念のグッズはいかがですか？<a href="#"><div class="shohin_shosai">詳細を見る</div></a></li>-->
        
        
        <?php for($i=0;$i<$GoNumRows;$i++){ ?>
        <li aria-haspopup="true"><img src="../admin/goods/upload/<?php print $GoRowAry[$i]["goods_img"]; ?>" style="max-width:480px;height:300px;vertical-align: bottom;"><h3><?php print $GoRowAry[$i]["goods_name"]; ?></h3>&nbsp;&nbsp;値段<?php print $GoRowAry[$i]["goods_price"]; ?>円
            <a href="#"><div class="shohin_shosai" aria-haspopup="false">詳細を見る</div></a></li>
        <?php } ?>
    </ul>
    <h2 class="contents_name" id="service-free-rental">無料貸出サービス</h2>
      <div id="rental">
    <table id="service_list">
        <tr class="service"><th>チャイルドシート</th><td><img src="images/childseat.png" style="float:right; height:100px;">
      ・ホワイエ入り口にて係員にお申し出ください。</td></tr>
      <tr class="service"><th>膝掛け用ブランケット</th><td><img src="images/brancket.jpg" style="float:right; height:100px;">
      ・ホワイエ入り口にて係員にお申し出ください。<br><span class="aka">※数に限りがございます。ご了承下さい。</span></td></tr>
      <tr class="service"><th>難聴者向けヘッドフォン </th><td><img src="images/goo_059.jpg" style="float:right; height:100px;">
      ・入場時に係員にお申し出下さい。<br><span class="aka">※数に限りがございます。ご了承下さい。</span></td></tr>
    </table>
          </div>
      <h2 class="contents_name" id="service-manner">鑑賞マナー向上への取り組み</h2>
      &nbsp;&nbsp;すべてのお客様が映画を楽しむために、守っていただきたいマナーがあります。ハルシネマのスタッフもマナー向上のお手伝いをいたします。
      何かありましたらスタッフに声をおかけください。<br>
      <span class="aka">※他のお客様の迷惑になった場合は、ご退席していただくこともございます。</span>
    <ul id="manner_list">
        <p>守っていただきたいマナーリスト</p>
      <li class="manner">禁煙</li>
      &nbsp;&nbsp;ハルシネマはスクリーン内はもちろんのことロビーも含めすべての空間で禁煙になっております。
      携帯電話およびスマートフォンについて 
      スクリーン内での携帯電話およびスマートフォンのご使用は他のお客様のご迷惑になりますのでご遠慮ください。 上映中のメールチェックも画面が明るくなり、周りの方への迷惑となります。 上映中はマナーモードでなく、電源をお切り下さい。
      <li class="manner">入退場最優先</li>
      &nbsp;&nbsp;車イスご利用の方などを安全のために入退場を優先する場合がございます。
      <li class="manner">映画上映中のおしゃべり</li>
      &nbsp;&nbsp;映画上映中のおしゃべりは、周りの方は気になって映画に集中できませんので、ご遠慮下さい。
      <li class="manner">正しい着席姿勢でご鑑賞下さい</li>
      &nbsp;&nbsp;前の座席を蹴らないでください。靴を履いているいないにかかわらず、前の座席に足を乗せることはお止め下さい。
      <li class="manner">お子様のご入場について</li>
      &nbsp;&nbsp;お子様が大きな声を出したり、劇場内を走り回ったりすることは他のお客様のご迷惑になります。 お子様の行動には保護者の方が責任を持ってください。
      <li class="manner">上映スクリーン</li>
      &nbsp;&nbsp;上映スクリーンは特殊な素材で出来ています。軽く触っただけでも映写効果は大きなダメージを受けますので決して触らないようお願いいたします。
      <li class="manner">録音・撮影機器の持ち込み禁止</li>
      &nbsp;&nbsp;知的財産保護の観点から、無許可での映画の録音・録画は禁止しています。 そのために随時館内の巡回および、上映時の監視を行います。また必要があればお手回り品の検査を行います。
      <li class="manner">アルコール飲料の制限</li>
      &nbsp;&nbsp;ハルシネマではアルコール飲料の販売を行っておりますが、飲みすぎにはご注意下さい。お車を運転されてのご来場のお客様は、ご飲酒をご遠慮下さい。また未成年に見える場合には年齢を証明するものをご提示いただく場合もあります。あらかじめご了承下さい。
      <li class="manner">飲食物持込の制限</li>
      &nbsp;&nbsp;当劇場のコンセッション（売店）でご購入頂いた商品のみシアター内にお持込頂けます。それ以外の飲食物の持ち込みはご遠慮下さい。
      <li class="manner">ペット持ち込みについて</li>
      &nbsp;&nbsp;ペット持ち込みは禁止とさせていただきます。ただし盲導犬・聴導犬・介助犬については認定書を確認できれば入場できます。ペット連れでのご来場についても、劇場では預かりかねます。
    </ul>
</section>    
    </div>
    <footer></footer>
    
</body>

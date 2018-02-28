<?php
include($_SERVER['DOCUMENT_ROOT'].'/halcinema/admin/login_session.php');
header('Content-Type:text/html; charset=UTF-8');

include($_SERVER['DOCUMENT_ROOT'].'/halcinema/admin/mysqlenv.php');

try{
    $dbh = new PDO($pdoDsn, $pdoUser, $pdoPass);
    if($dbh == null){
        exit('DB接続失敗');
    }
    $dbh->query('set names utf8');
    $sql = " select * from t_member ";
    $stmt = $dbh->query($sql);
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $rows[] = $result;
    }
    $count = $stmt->rowCount();
}catch(PDOException $e){
    echo 'Error:'.$e->getMessage();
    die();
}
$dbh = null;

require_once('tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true ,"UTF-8");
$pdf->SetFont('kozminproregular', '', 12);
$pdf->AddPage();

$pdf->Cell(0, 20, '会員一覧', 1, 1, 'C');
$pdf->Cell(30, 12,'名前', 1, 0, 'C');
$pdf->Cell(30, 12, 'フリガナ', 1, 0, 'C');
$pdf->Cell(30, 12, 'メールアドレス', 1, 0, 'C');
$pdf->Cell(30, 12, '電話番号', 1, 0, 'C');
$pdf->Cell(20, 12, '郵便番号', 1, 0, 'C');
$pdf->Cell(50, 12, '住所', 1, 1, 'C');

for($i=0; $i<$count; $i++){
    $pdf->Cell(30, 12, $rows[$i]['mem_name_kanji'], 1, 0, 'C');
    $pdf->Cell(30, 12, $rows[$i]['mem_name_furigana'], 1, 0, 'C');
    $pdf->Cell(30, 12, $rows[$i]['mem_mail'], 1, 0, 'C');
    $pdf->Cell(30, 12, $rows[$i]['mem_tel'], 1, 0, 'C');
    $pdf->Cell(20, 12, $rows[$i]['mem_post'], 1, 0, 'C');
    $pdf->Cell(50, 12, $rows[$i]['mem_pref'].$rows[$i]['mem_city'].$rows[$i]['mem_add'], 1, 1, 'C');
}
$pdf->Output('member.pdf', 'I');
?>
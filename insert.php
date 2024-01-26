<?php
session_start();
require_once('funcs.php');

//1. POSTデータ取得
$name   = $_POST['name'];
$url  = $_POST['url'];
$publisher  = $_POST['publisher'];
$content = $_POST['content'];
$gptcontent = getGptSummary($content);

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_an_table(name,url,publisher,content,gptcontent, indate)VALUES(:name,:url,:publisher,:content,:gptcontent,sysdate());');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':publisher', $publisher, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':gptcontent', $gptcontent, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}

?>

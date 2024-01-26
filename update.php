<?php
//1. POSTデータ取得
$name   = $_POST['name'];
$url  = $_POST['url'];
$publisher  = $_POST['publisher'];
$content = $_POST['content'];
$id     = $_POST['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//var_dump($name);
//var_dump($url);

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_an_table SET name=:name,url=:url,publisher=:publisher,content=:content WHERE id=:id;');
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);
$stmt->bindValue(':url',  $url,  PDO::PARAM_STR);
$stmt->bindValue(':publisher',  $publisher,  PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':id',  $id, PDO::PARAM_INT);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

<?php
// ベースカラーを緑に設定するかどうかの変数
$baseColorGreen = true;

// 0. SESSION開始！！
session_start();
require_once('funcs.php');

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_an_table');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="detail.php?id=' . $r["id"] . '">';
        $view .= h($r['id']) . " " . h($r['name']);
        $view .= '<br>';
        $view .= h($r['url']);
        $view .= '</a>';
        $view .= "　";
        $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r['id'] . '">';

        if ($_SESSION['kanri_flg'] === 1) {
        $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
        }

        $view .= '</a>';
        $view .= '</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book List</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        <?php if ($baseColorGreen): ?>
        /* ベースカラーを緑にするスタイル */
            body {
                background-color: #e9f5ee; /* 薄い緑色 */
            }

            .navbar-default {
                background-color: #28a745; /* 明るい緑色 */
                border-color: #28a745; /* 濃い緑色 */
            }

            .navbar-default .navbar-brand {
                color: white;
            }
        /* ここに他の緑色スタイルを追加 */
        <?php endif; ?>

        </style>



</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

</body>

</html>

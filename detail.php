<?php

session_start();
require_once('funcs.php');

$id = $_GET['id']; //?id~**を受け取る
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_an_table WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}

$baseColorGreen = true;

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
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

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>名前：<input type="text" name="name" value="<?= $row['name'] ?>"></label><br>
                <label>URL：<input type="text" name="url" value="<?= $row['url'] ?>"></label><br>
                <label>Publisher：<input type="text" name="publisher" value="<?= $row['publisher'] ?>"></label><br>
                <label><textArea name="content" rows="4" cols="40"><?= $row['content'] ?></textArea></label><br>
                
                    <?php
                if ($_SESSION['kanri_flg'] === 1) {
                    echo '<input type="submit" value="送信">';
                }
                ?>




                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>

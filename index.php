<?php
// ベースカラーを緑に設定するかどうかの変数
$baseColorGreen = true;
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="insert.php">    
        <div class="jumbotron">
            <fieldset>
                <legend>書籍登録</legend>
                <label>書籍名：<input type="text" name="name"></label><br>
                <label>URL：<input type="text" name="url"></label><br>
                <label>出版社：<input type="text" name="publisher"></label><br>
                <label><textArea name="content" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->

</body>

</html>

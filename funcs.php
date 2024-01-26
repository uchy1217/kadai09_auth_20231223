<?php

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = 'gs_db5_book';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}


// ログインチェック処理 LoginCheck()
function LoginCheck(){
if ( !isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id()){
    exit('LOGIN ERROR');
} else{
    //ログイン済み処理
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
}
}


// chatGPT
function getGptSummary($content) {
    $req_question =  "次の内容を100文字で要約して:" . $content;
    $result = array();
    
    // APIキー
    $apiKey = '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';
    
    //openAI APIエンドポイント
    $endpoint = 'https://api.openai.com/v1/chat/completions';
    
    $headers = array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $apiKey
    );
    
    // リクエストのペイロード
    $data = array(
      'model' => 'gpt-4-1106-preview',
      'messages' => [
        [
        "role" => "system",
        "content" => "日本語で応答してください"
        ],
        [
        "role" => "user",
        "content" => $req_question
        ]
      ]
    );
    
    // cURLリクエストを初期化
    $ch = curl_init();
    
    // cURLオプションを設定
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    // APIにリクエストを送信
    $response = curl_exec($ch);
    
    // cURLリクエストを閉じる
    curl_close($ch);
    
    // 応答を解析
    $result = json_decode($response, true);
    
    // 生成されたテキストを取得
    $text = $result['choices'][0]['message']['content'];
    
    var_dump($text);

    return $text;
    }



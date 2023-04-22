<?php include 'header.php' ?>

<?php
// アプリケーション設定
// define('CLIENT_ID', '1076303706791-lo4j05trdq3q8d8cr5bjieasbmh9cn3n.apps.googleusercontent.com');
// define('CLIENT_SECRET', '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');

// // エンドポイント
// define('TOKEN_URL', 'https://oauth2.googleapis.com/token'); // トークンエンドポイント
// define('CALLBACK_URL', 'https://challenge.ikefukuro40.tech/j28_callback.php'); // リダイレクトエンドポイント

// // リソース
// define('ALBUMS_URL', 'https://photoslibrary.googleapis.com/v1/albums');

// $code = $_GET['code']; // 認可コード

// $params = array(
//   'code'          => $code,
// 	'client_id'     => CLIENT_ID,
// 	'client_secret' => CLIENT_SECRET,
// 	'redirect_uri'  => CALLBACK_URL,
// 	'grant_type'    => 'authorization_code'
// );

// // POST送信
// $options = array('http' => array(
//    "method"  => "POST",
//    "content" => http_build_query($params)
// ));

// // アクセストークン情報一覧の取得
// $res = file_get_contents(TOKEN_URL, false, stream_context_create($options));

// // アクセストークンの取得
// $token = json_decode($res, true);
// if(isset($token['error'])){
// 	echo 'エラー発生';
// 	exit;
// }
// $access_token = $token['access_token'];

// $params = array('access_token' => $access_token);

// // アルバム情報取得
// $res = file_get_contents(ALBUMS_URL . '?' . http_build_query($params));

// //表示
// echo $res;


?>
<style>

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/dubrox/Multiple-Dates-Picker-for-jQuery-UI@master/jquery-ui.multidatespicker.js"></script>
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script>
    $(function() {

    });

</script>
  <main>
    <div class="container">
      <h1>OAuth2 x Google Photo API</h1>


    

    </div>
  </main>

<?php include 'footer.php' ?>
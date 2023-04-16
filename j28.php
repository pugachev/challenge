<?php include 'header.php' ?>

<?php
// if($_GET['client_id']){
//   print_r($_GET);
//   // die();
// }
if($_SERVER["REQUEST_METHOD"] == "POST"){
   // アプリケーション設定
   define('CLIENT_ID', '1076303706791-lo4j05trdq3q8d8cr5bjieasbmh9cn3n.apps.googleusercontent.com');
   
   // エンドポイント
   define('AUTH_URL', 'https://accounts.google.com/o/oauth2/v2/auth'); // 認可エンドポイント
   define('CALLBACK_URL', 'https://challenge.ikefukuro40.tech/j28_callback.php'); // リダイレクトエンドポイント
   
   // スコープ
   define('SCOPE', 'https://www.googleapis.com/auth/photoslibrary.readonly'); // 読み込み権限
   
   $params = array(
           'client_id'     => CLIENT_ID,
           'redirect_uri'  => CALLBACK_URL,
           'scope'         => SCOPE,
           'response_type' => 'code',
   );

  // 認証ページにリダイレクト
  header("Location: " . AUTH_URL. '?' . http_build_query($params));
}



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
      <form action="" method="POST">
      <input type="submit" value="認証する！">
      </form>

    

    </div>
  </main>

<?php include 'footer.php' ?>
<?php
include __DIR__.'/lib/connect.php';
include __DIR__.'/lib/queryFemaleData.php';
include __DIR__.'/lib/queryAgeData.php';
include __DIR__.'/lib/queryFinancialData.php';


function getFileUpload($file_data, $target_path, $upload_name = '')
{
    // ファイルの有無
    if (empty($file_data)) {
        return FALSE;
    }

    // 0は成功、それ以外は失敗
    if ($file_data['error'] != '0') {
        return FALSE;
    }

    // 存在チェック
    if (! file_exists($target_path)) {
        return FALSE;
    }

    try {
        // アップロード後のファイル名が未定義の場合は元ファイルと同じに
        if (empty($upload_name)) {
            $upload_name = $file_data['name'];
        }
        // アップロード後のファイルの移動先
        $destination = $target_path . $upload_name;
        // テンポラリからファイルを移動
        move_uploaded_file($file_data['tmp_name'], $destination);
    } catch (Exception $e) {
        return FALSE;
    }

    return TRUE;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>池フクロウ</title>
  <link rel="icon" href="img/favicon.png">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/colorbox.css">
  <link rel="stylesheet" href="css/calendar.css">
  <link rel="stylesheet" href="css/theme.css">
  <link rel="stylesheet" href="css/s_calendar.min.css">
  <link rel="stylesheet" href="css/responsive.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
  <script src="js/jquery.colorbox-min.js"></script> 
  <script src="js/jquery.minicalendar.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <link rel="stylesheet" type="text/css" href="./style.css" />
  <script type="module" src="./index.js"></script>
</head>
<body>
  <header>
    <div class="container">
      <div>
        <img
          src="img/taro.png"
          alt="太郎のアイコン"
          width="120"
          height="120"
          class="icon">
      </div>
      <div>
        <h1>池フクロウ</h1>
        <p>50代のチャレンジャーです</p>
        <ul>
          <li>
            <a href="#">
              <img
                src="img/blog.png"
                alt="ブログアイコン"
                width="20"
                height="20">
            </a>
          </li>
          <li>
            <a href="#">
            <img
              src="img/photos.png"
              alt="写真アイコン"
              width="20"
              height="20">
          </a>
          </li>
        </ul>
      </div>
    </div>
  </header>
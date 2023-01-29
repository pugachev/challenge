<?php include 'header.php' ?>
<?php

if(isset($_POST['csvtype']) && !empty($_POST['csvtype'])) {
  //全データを取得する
  $qfd=new QueryFinancialData();
  $results = $qfd->getFinancialData();
  $csvoutput = $_POST['csvtype'];
  $header = ['id','financialnumber','item','price','outputflg'];
  $csvdata = [];
  $csvdata[] = $header;
  $csvdata[] = $results;

  $fp = fopen('file.csv', 'w');
  // 1行ずつ配列の内容をファイルに書き込む
  
  //会計番号でグループ化
  if($csvoutput==0){
    $header = ['financialnumber','price'];
    fputcsv($fp, $header);
    $prenumber = '';
    $totalprice = 0;
    $sumdata = [];

    //financialnumberよりユニークキーを取り出す
    $keyarray = array_unique(array_column($results, "financialnumber"));

    $groups = [];

    foreach($results as $result){
      foreach($keyarray as $key){
          if($key==$result['financialnumber']){
              $groups[$key] += $result['price'];
          }
      }
    }

    fputcsv($fp, $groups);

  }
  //そのまま全行
  else
  {
    //ヘッダ書き込み
    $header = ['financialnumber','totalprice'];
    fputcsv($fp, $header);


    //financialnumberよりユニークキーを取り出す
    $keyarray = array_unique(array_column($results, "financialnumber"));

    //加算用連想配列を作成しておく
    foreach ($keyarray as $key){
      $addUp[$key]=0;
    }



    //A001とA002がとりだされる この2つでまとめて足し込む
    //DBから出力されるデータは以下のイメージ
    // $results[] = array ( 'id' => '6', 'financialnumber' => 'A001', 'item' => 'カレー', 'price' => '1000', 'outputflg' => '1', );
    // $results[] = array ( 'id' => '7', 'financialnumber' => 'A002', 'item' => 'ラーメン', 'price' => '800', 'outputflg' => '1', );
    // $results[] = array ( 'id' => '8', 'financialnumber' => 'A001', 'item' => 'うどん', 'price' => '850', 'outputflg' => '1', );
    // $results[] = array ( 'id' => '9', 'financialnumber' => 'A001', 'item' => '焼き飯', 'price' => '700', 'outputflg' => '1', );
    // $results[] = array ( 'id' => '10', 'financialnumber' => 'A002', 'item' => 'パン', 'price' => '600', 'outputflg' => '1', );
    foreach($keyarray as $key){
      foreach($results as $result){
        if (in_array($key, $result, true)) {
          $addUp[$key] += $result['price'];
        }
      }
    }

    //CSV出力用の配列を作成する
    foreach($addUp as $key=>$val){
      $outputData[] = [$key,$val];
      // var_dump($key.'   '.$val);
    }
    // foreach ($keyarray as $key) {
    //   $outputData = array($key,$addUp[$key]);
    // }

    //CSVを出力する
    foreach ($outputData as $value) {
      // foreach($value as $key=>$val){
        fputcsv($fp, array($value[0],$value[1]));
        // echo $value[0] . '   ' . $value[1] . PHP_EOL;
      // }
    }

    // die();





    // $header = ['financialnumber','totalprice'];
    // fputcsv($fp, $header);
    // $prenumber = '';
    // $totalprice = 0;
    // $sumdata = [];

    // //financialnumberよりユニークキーを取り出す
    // $keyarray = array_unique(array_column($results, "financialnumber"));

    // $groups;
    // foreach ($keyarray as $key) {
    //   if(empty($groups)){
    //     $groups = array($key => 0);
    //   }else{
    //     $groups = array_merge($groups,array($key => 0));
    //   }
    // }

    // foreach($results as $result){
    //   foreach ($keyarray as $key) {
    //     if (in_array($key, $result, true)) {
    //       $groups[$key] += $result['price'];
    //     }
    //   }
    // }

    // //出力用の配列を生成する
    // $outputarray = [];
    // foreach($keyarray as $key){
    //   $outputarray[] = [$key,$groups[$key]];
    // }

    // foreach ($outputarray as $value) {
    //   fputcsv($fp, $value);
    // }
  }

  // ファイルを閉じる
  fclose($fp);
}


?>
<style>
  .content {
      padding:1em;
      margin:0.5em auto;
      width:50%;
  }

  .raidozone{
    margin-bottom:30px;
  }

  .raidozone>label{
    margin-top: 30px;
    display: inline-block;
    padding: 5px;
    font-size: 20px;
    cursor: pointer;
  }
  .raidozone>label:hover{
      color: red;
  }
  .raidozone>label>input{
      margin-right: 5px;
      cursor: pointer;
  }

  .csvoutput{
    width:50%;
    margin: 0 auto;
  }


  .btn--orange{
    display: block;
    text-align: center;
    vertical-align: middle;
    text-decoration: none;
    width: 120px;
    margin: auto;
    padding: 1rem 4rem;
    font-weight: bold;
    border: 2px solid #27acd9;
    background: #27acd9;
    color: #fff;
    transition: 0.5s;
  }
  .btn--orange:hover{
    color: #27acd9;
	  background: #fff;
  }

</style>
<script>
    $(document).ready(function(){

    });
</script>
  <main>
    <div class="container">
      <form action ="j11.php" method="post">
            <div class="content">
                <div class="raidozone">
                    <label><input type="radio" name="csvtype" value=0>会計番号でグループ化</label>
                    <label><input type="radio" name="csvtype" value=1>そのまま全行</label>
                </div>
                <div class="csvoutput">
                  <input type="submit" value="CSV出力" class="btn--orange" style="width:200px;"/>
                </div>
            </div>
      </form>
    </div>
  </main>

<?php include 'footer.php' ?>
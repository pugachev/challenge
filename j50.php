<?php include 'header.php' ?>
<?php
// $tgt = [
//     "cate" => "神戸牛",
//     "cateId" => 10,
//     "subcate" => "せいろ蒸し",
//     "subcateArray" => [
//         array("id"=>100,"name"=>"せいろ蒸し(7800円)"),
// 		array("id"=>101,"name"=>"せいろ蒸し(1800円)"),
//     ]
// ];



  //全データを取得する
  $qfd=new QueryCategory();
  $tgt = $qfd->getCategoryData();
//   var_dump($results);
//   $jsonArray = json_encode($results);
// $tgt = [];
// $tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2000,"subcatename"=> "焼き肉","courseid"=>3000,"coursename"=>"神戸牛焼き肉(10000円)");
// $tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2000,"subcatename"=> "焼き肉","courseid"=>3003,"coursename"=>"神戸牛焼き肉(12000円)");
// $tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2001,"subcatename"=> "せいろ蒸し","courseid"=>3001,"coursename"=>"神戸牛せいろ蒸し(12000円)");
// $tgt[] = array("cateid"=>1001,"catename"=>"黒毛和牛","subcateid"=>2004,"subcatename"=> "せいろ蒸し","courseid"=>3002,"coursename"=>"黒毛和牛せいろ蒸し(8000円)");

$result = [];
foreach ($tgt as $row) {
    $category = $row['cateid'].'_'.$row['catename'];
    $subcategory = $row['subcateid'].'_'.$row['subcatename'];
    $result[$category][$subcategory] = $row['courseid'].'_'.$row['coursename'];
}
// $result = MultiColumn($tgt, ['cateid', 'subcateid']);

$jsonArray = json_encode($result);
?>
<body>
<main>
    <div class="container">
      <div class="wrap">
          <div class="content">
		  	<div id="list-item">
          </div>
      </div>
    </div>
  </main>
    
    <script>
      $(function() {

		// liに追加する内容
		let menudata = [['神戸牛','せいろ蒸し12000','焼き肉100g'],['黒毛和牛','せいろ蒸し13000','焼き肉200g','焼き肉300g'],['オージービーフ1700円']];
		 
		$(function() {
			console.log(JSON.parse('<?php echo $jsonArray; ?>'));
		});


		// var initData = ["リスト", "リスト2", "リスト3"];
    
		// $.each(initData, function() {
		// $("#myList").prepend("<li>" + this + "</li>");
		// });
		// console.log(JSON.parse('<?php echo $jsonArray; ?>'));
		// let array = JSON.parse('<?php echo $jsonArray; ?>');
		// console.log(array[0]['courseid']+' '+array[0]['coursename']+' '+array[0]['cateid']);
		// array['subcateArray'].forEach(element => {
		// 	console.log(element['id'] + ' ' +element['name']);
		// });
      });
    </script>
</body>
<?php include 'footer.php' ?>

<!-- {
	"menu": [
	  {
		"id": 10,
		"name": "神戸牛",
		  "せいろ蒸し": [
			{
			  "id": 100,
			  "title": "猫に小判/豚に真珠/牛に経文"
			},
			{
			  "id": 101,
			  "title": "雪に白鷺/闇夜のカラス"
			}
		  ],
		  "焼き肉": [
			{
			  "id":200,
			  "title": "猫に小判/豚に真珠/牛に経文"
			},
			{
			  "id": 201,
			  "title": "雪に白鷺/闇夜のカラス"
			}
		  ]
	  },
	  {
		"id": 10,
		"name": "黒毛和牛",
		  "せいろ蒸し": [
			{
			  "id": 300,
			  "title": "せいろ蒸し(2600円)"
			},
			{
			  "id": 301,
			  "title": "せいろ蒸し(3300円)"
			}
		  ],
		  "焼き肉": [
			{
			  "id":400,
			  "title": "焼き肉(9800円)"
			},
			{
			  "id": 401,
			  "title": "焼き肉(28000円)"
			}
		  ]
	  }
	]
} -->



<!-- {"menu":[{"id":10,"name":"神戸牛","せいろ蒸し":[{"id":100,"title":"猫に小判/豚に真珠/牛に経文"},{"id":101,"title":"雪に白鷺/闇夜のカラス"}],"焼き肉":[{"id":200,"title":"猫に小判/豚に真珠/牛に経文"},{"id":201,"title":"雪に白鷺/闇夜のカラス"}]},{"id":10,"name":"黒毛和牛","せいろ蒸し":[{"id":300,"title":"せいろ蒸し(2600円)"},{"id":301,"title":"せいろ蒸し(3300円)"}],"焼き肉":[{"id":400,"title":"焼き肉(9800円)"},{"id":401,"title":"焼き肉(28000円)"}]}]} -->

<!-- session_start();

// 前回のキー値をセッションから取得
$previous_key = $_SESSION['previous_key'] ?? null;

// 現在のキー値を設定
$current_key = 'example_key'; // 例として 'example_key' を設定していますが、実際には適切なキー値を取得する必要があります

// 前回のキー値と現在のキー値を比較
if ($current_key === $previous_key) {
    echo "前回と同じキー値です";
} else {
    echo "前回と異なるキー値です";
}

// 現在のキー値をセッションに保存
$_SESSION['previous_key'] = $current_key;


// データベースに接続（適切な接続情報を使用してください）
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// 前回のキー値をデータベースから取得
$stmt = $pdo->prepare("SELECT previous_key FROM key_history ORDER BY id DESC LIMIT 1");
$stmt->execute();
$previous_key = $stmt->fetchColumn();

// 現在のキー値を設定
$current_key = 'example_key'; // 例として 'example_key' を設定していますが、実際には適切なキー値を取得する必要があります

// 前回のキー値と現在のキー値を比較
if ($current_key === $previous_key) {
    echo "前回と同じキー値です";
} else {
    echo "前回と異なるキー値です";
}

// 現在のキー値をデータベースに保存
$stmt = $pdo->prepare("INSERT INTO key_history (previous_key) VALUES (?)");
$stmt->execute([$current_key]);


$previous_value = null; // 最初は前の値がないため、nullで初期化する

$array = [1, 2, 3, 4, 5]; // 例として配列を使用

for ($i = 0; $i < count($array); $i++) {
    $current_value = $array[$i];

    // 前の値と現在の値を使って何かを行う
    if ($previous_value !== null) {
        echo "前の値: $previous_value, 現在の値: $current_value\n";
    }

    // 現在の値を一時変数に代入し、次の反復のために前の値を更新する
    $previous_value = $current_value;
}


$nested_array = [
    [10, 20, 30],
    [40, 50, 60],
    [70, 80, 90],
    // 追加の配列...
];

$previous_value = null;
$previous_previous_value = null;

foreach ($nested_array as $outer_key => $inner_array) {
    foreach ($inner_array as $inner_key => $current_value) {
        // 一つ前の値と二つ前の値を使って何かを行う
        if ($previous_value !== null) {
            echo "一つ前の値: $previous_value, 二つ前の値: $previous_previous_value, 現在の値: $current_value\n";
        }

        // 現在の値を一時変数に代入し、次の反復のために前の値を更新する
        $previous_previous_value = $previous_value;
        $previous_value = $current_value;
    }
} -->

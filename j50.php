<?php include 'header.php' ?>
<?php
$tgt = [
    "cate" => "神戸牛",
    "cateId" => 10,
    "subcate" => "せいろ蒸し",
    "subcateArray" => [
        array("id"=>100,"name"=>"せいろ蒸し(7800円)"),
		array("id"=>101,"name"=>"せいろ蒸し(1800円)"),
    ]
];

$jsonArray = json_encode($tgt);

?>
<body>
<main>
    <div class="container">
      <div class="wrap">
          <div class="content">

          </div>
      </div>
    </div>
  </main>
    
    <script>
      $(function() {
		// console.log(JSON.parse('<?php echo $jsonArray; ?>'));
		let array = JSON.parse('<?php echo $jsonArray; ?>');
		console.log(array['cate']+' '+array['cateId']+' '+array['subcate']);
		array['subcateArray'].forEach(element => {
			console.log(element['id'] + ' ' +element['name']);
		});
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
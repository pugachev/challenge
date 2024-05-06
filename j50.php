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
  $results = $qfd->getCategoryData();
  var_dump($results);
  $jsonArray = json_encode($results);
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
		    var test = '<ul>';
		    $.each(menudata, function(key, value) {
			    test = '<li class="cate">'+value[0]+'<ul class="subcate">';
				$.each(value, function(key2, cvalue) {
				       if(key2==0){
				       	console.log(key2 + ' '+ cvalue);
				       	return true;
				       }
					test += '<li>'+cvalue+'</li>';
				});
			    test += '</ul></li>';
			    $('#list-item').append(test);
		    });
	           
			//子要素のクリックイベント
			$('.cate').click(function() {
				$(this).children('ul').slideToggle();
			});
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
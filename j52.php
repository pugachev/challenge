<?php include 'header.php' ?>
<?php
  //全データを取得する
  $qfd=new QueryCategory();
  $inputArray = $qfd->getCategoryData();

  $categoriesData = array();

  foreach ($inputArray as $item) {
	  $categoryId = $item['cateid'] . '_' . $item['catename'];
	  $subcategoryId = $item['subcateid'] . '_' . $item['subcatename'];
	  $courseName = $item['courseid'] . '_' . $item['coursename'];
  
	  if (!isset($categoriesData[$categoryId])) {
		  $categoriesData[$categoryId] = array();
	  }
  
	  if (!isset($categoriesData[$categoryId][$subcategoryId])) {
		  $categoriesData[$categoryId][$subcategoryId] = array();
	  }
  
	  $categoriesData[$categoryId][$subcategoryId][] = $courseName;
  }
  
  // JavaScriptの形式に変換
  $jsCategoriesData = array();
  
  foreach ($categoriesData as $categoryId => $subcategories) {
	  $categoryArray = array($categoryId);
  
	  foreach ($subcategories as $subcategoryId => $courses) {
		  $subcategoryArray = array($subcategoryId, $courses);
		  $categoryArray[] = $subcategoryArray;
	  }
  
	  $jsCategoriesData[] = $categoryArray;
  }
  
  $jsonArray = json_encode($jsCategoriesData);
?>
    <style>
        .category {
            cursor: pointer;
        }
        .subcategory {
            display: none;
            padding-left: 20px;
        }
    </style>
<body>
<main>
    <div class="container">
      <div class="wrap">
          <div class="content">
		  	<ul id="categories-list"></ul>
          </div>
      </div>
    </div>
  </main>
    
    <script>
      $(function() {
		// カテゴリとサブカテゴリのデータ（例）
		var categoriesData = [
			[
				'1000_神戸牛',
				[
					['2000_焼き肉', ['3000_神戸牛焼き肉(10000円)', '3003_神戸牛焼き肉(12000円)']],
					['2001_せいろ蒸し', ['3001_神戸牛せいろ蒸し(12000円)']]
				]
			],
			[
				'1001_黒毛和牛',
				[
					['2004_せいろ蒸し', ['3002_黒毛和牛すき焼き(8000円)']]
				]
			],
		];

		

		var categoriesData = JSON.parse('<?php echo $jsonArray; ?>');

		console.log(categoriesData);

		// ul要素を取得
		var $categoriesList = $('#categories-list');

		// カテゴリごとにループ
		$.each(categoriesData, function(index, categoryData) {
			// カテゴリ用のli要素を作成し、ul要素に追加
			var $categoryItem = $('<li>').text(categoryData[0].split('_')[1]).attr('value', categoryData[0].split('_')[0]);
			$categoriesList.append($categoryItem);

			// サブカテゴリ用のul要素を作成
			var $subcategoriesList = $('<ul>');
			var $submenuList =null;
			// サブカテゴリごとにループ
			$.each(categoryData[1], function(subindex, subcategory) {
				// サブカテゴリ用のli要素を作成し、サブカテゴリ用のul要素に追加
				var $subcategoryItem = $('<li>').text(subcategory[0].split('_')[1]).attr('value', subcategory[0].split('_')[0]);
				$subcategoriesList.append($subcategoryItem);
				// サブメニュー用のul要素を作成
				$submenuList = $('<ul>');
				var tmp = subcategory[1];
				for(var i=0;i<tmp.length;i++){
					var $subcategoryItem = $('<li>').text(tmp[i].split('_')[1]).attr('value', tmp[i].split('_')[0]);
					$submenuList.append($subcategoryItem);
				}
				// サブメニューをサブカテゴリに追加
				$subcategoriesList.append($submenuList);
			});


			// サブカテゴリ用のul要素をカテゴリ用のli要素に追加
			$categoryItem.append($subcategoriesList);
		});

      });
    </script>
</body>
<?php include 'footer.php' ?>

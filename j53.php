<?php include 'header.php' ?>
<?php
  //全データを取得する
  $qfd=new QueryCategory();
  $inputArray = $qfd->getCategoryData();

//   $inputArray = array(
//     array(
//         "cateid" => 1000,
//         "catename" => "神戸牛",
//         "subcateid" => 2000,
//         "subcatename" => "焼き肉",
//         "courseid" => 3000,
//         "coursename" => "神戸牛焼き肉(10000円)"
//     ),
//     array(
//         "cateid" => 1000,
//         "catename" => "神戸牛",
//         "subcateid" => 2000,
//         "subcatename" => "焼き肉",
//         "courseid" => 3003,
//         "coursename" => "神戸牛焼き肉(12000円)"
//     ),
//     array(
//         "cateid" => 1000,
//         "catename" => "神戸牛",
//         "subcateid" => 2001,
//         "subcatename" => "せいろ蒸し",
//         "courseid" => 3001,
//         "coursename" => "神戸牛せいろ蒸し(12000円)"
//     ),
//     array(
//         "cateid" => 1001,
//         "catename" => "黒毛和牛",
//         "subcateid" => 2004,
//         "subcatename" => "せいろ蒸し",
//         "courseid" => 3002,
//         "coursename" => "黒毛和牛すき焼き(8000円)"
//     )
// );

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
echo "<script>";
echo "var categoriesData = " . json_encode($jsCategoriesData) . ";";
echo "</script>";
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
		  	<div id="categories"></div>
          </div>
      </div>
    </div>
  </main>
    
    <script>
      $(function(){
		// カテゴリリストを作成
		var categoryList = "<ul>";

		for (var i = 0; i < categoriesData.length; i++) {
			categoryList += "<li>" + categoriesData[i][0] + "<ul>";

			for (var j = 1; j < categoriesData[i].length; j++) {
				categoryList += "<li>" + categoriesData[i][j][0] + "<ul>";

				for (var k = 0; k < categoriesData[i][j][1].length; k++) {
					categoryList += "<li>" + categoriesData[i][j][1][k] + "</li>";
				}

				categoryList += "</ul></li>";
			}

			categoryList += "</ul></li>";
		}

		categoryList += "</ul>";

		$('#categories').html(categoryList);

      });
    </script>
</body>
<?php include 'footer.php' ?>

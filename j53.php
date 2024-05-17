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
        /* .category {
            cursor: pointer;
        }
        .subcategory {
            display: none;
            padding-left: 20px;
        } */

		ul{
			/* padding-left:0; */
		}

		li{
			list-style:none;
		}
        .subcategory{
            /* display: none; */
        }
    </style>
<body>
<main>
    <div class="container">
      <div class="wrap">
          <div class="content">
		  	<div class='accordion' id="categories"></div>
          </div>
      </div>
    </div>
  </main>
    
    <script>
      $(function(){
		// カテゴリリストを作成
		var categoryList = "<ul>";

		for (var i = 0; i < categoriesData.length; i++) {
            // カテゴリ
			categoryList += "<li class='category' value=" + categoriesData[i][0].split('_')[0] + ">" +  categoriesData[i][0].split('_')[1] + "<ul>";

			for (var j = 1; j < categoriesData[i].length; j++) {
				categoryList += "<li class='subcategory' value="+categoriesData[i][j][0].split('_')[0]+">" + categoriesData[i][j][0].split('_')[1] + "<ul>";

				for (var k = 0; k < categoriesData[i][j][1].length; k++) {
					categoryList += "<li class='course' value="+categoriesData[i][j][1][k].split('_')[0]+">" + categoriesData[i][j][1][k].split('_')[1] + "</li>";
				}

				categoryList += "</ul></li>";
			}

			categoryList += "</ul></li>";
		}

		categoryList += "</ul>";

		$('#categories').html(categoryList);


      });

      $(document).ready(function(){
        // 初期状態ではすべてのサブリストを非表示にする
        $('.accordion ul ul').hide();

        // アコーディオンメニューのクリックイベントを処理する
        $('.accordion > ul  li').click(function() {

            // イベントのバブリングを停止し、親要素のイベントがトリガーされるのを防ぐ
            event.stopPropagation();

            // 直接の子要素のサブリストを開閉する
            $(this).children('ul').slideToggle();

            // 兄弟要素のサブリストを閉じる
            $(this).siblings().children('ul > li').slideUp();

            return false;
        });

        // 二番目のレベルのサブメニューのクリックイベントを処理する
        $('.accordion > ul > li > ul > li').click(function(event) {
            // イベントのバブリングを停止し、親要素のイベントがトリガーされるのを防ぐ
            event.stopPropagation();

            // 直接の子要素のサブリストを開閉する
            $(this).children('ul').slideToggle();

            // 兄弟要素のサブリストを閉じる
            $(this).siblings().children('ul li').slideUp();

            return false;
        });
    });

    </script>
</body>
<?php include 'footer.php' ?>

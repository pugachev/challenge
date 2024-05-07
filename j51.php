<?php include 'header.php' ?>
<?php

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
		  <ul id="categoryList">
			<li class="category" value="100">食品
				<ul class="subcategory" value="1000">
					<li value="10001">野菜</li>
					<li value="10002">果物</li>
					<li value="10003">肉</li>
				</ul>
			</li>
			<li class="category">家電
				<ul class="subcategory">
					<li>テレビ</li>
					<li>冷蔵庫</li>
					<li>洗濯機</li>
				</ul>
			</li>
			</ul>
          </div>
      </div>
    </div>
  </main>
    
    <script>
      $(function() {
		// カテゴリをクリックしたらサブカテゴリを表示・非表示
		// $('.category1').on('click', function() {
		// 	$(this).children('.subcategory1').slideToggle();
		// });
		$('.category').click(function(){
			$(this).children('.subcategory').slideToggle();
		});
		$('.subcategory > li').click(function(){
			console.log($(this).val());
		});
      });
    </script>
</body>
<?php include 'footer.php' ?>

<?php include 'header.php' ?>
<?php

?>
<style>
* {
  box-sizing: border-box;
}
    
ul,
li {
  padding: 0;
  margin: 0;
}

li {
  list-style: none;
}

.tab {
  width: 500px;
  max-width: 100%;
  margin: auto;
}

.tab-menu {
  display: flex;
}

.tab-item {
  text-align: center;
  padding: 10px 0;
  cursor: pointer;
  
  /* widthを同じ比率で分けあう */
  flex-grow: 1;

  /* 下線以外をつける */
  border-top: 1px solid skyblue;
  border-left: 1px solid skyblue;
  border-right: 1px solid skyblue;
}
    
.tab-item:not(:first-child) {
  border-left: none;
}

/* アクティブなタブはデザインを変えて選択中であることが解るようにする */
.tab-item.active {
  background: red;
  color: white;
}

.tab-box {
  height: 200px;
  display: flex;
  justify-content: center;
  align-items: center;
  border: 1px solid skyblue;
}
    
/* コンテンツは原則非表示 */
.tab-content {
  display: none;
  font-size: 40px;
}

/* .showがついたコンテンツのみ表示 */
.tab-content.show {
  display: block;
}
</style>
<script>
    $(document).ready(function(){
      $('.tab-item').click(function() {
        //現在activeが付いているクラスからactiveを外す
        $('.active').removeClass('active');

        //クリックされたタブメニューにactiveクラスを付与。
        $(this).addClass('active');

        //一旦showクラスを外す
        $('.show').removeClass('show');

        //クリックしたタブのインデックス番号取得
        const index = $(this).index();

        //タブのインデックス番号と同じコンテンツにshowクラスをつけて表示する
        $('.tab-content').eq(index).addClass('show');
      });
    });
</script>

<div class="tab">
 
  <!--  タブメニュー  -->
  <ul class="tab-menu">
    <li class="tab-item active">タブ1</li>
    <li class="tab-item">タブ2</li>
    <li class="tab-item">タブ3</li>
  </ul><!-- /.tab_menu -->
  
  <!--  コンテンツ  -->
  <div class="tab-box">
    <div class="tab-content show">コンテンツ1</div>
    <div class="tab-content">コンテンツ2</div>
    <div class="tab-content">コンテンツ3</div>
  </div>

</div>
<?php include 'footer.php' ?>
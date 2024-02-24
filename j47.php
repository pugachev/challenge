<?php include 'header.php' ?>
<?php

?>
<style>
        .wrap {
            display:flex;
            flex-flow: column;
            height:300px;
            margin:0 0 1em;
        }
        .content {
            padding:1em;
            margin:0.5em auto;
            width:80%;
        }
</style>

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
      //.accordion_oneの中の.accordion_headerがクリックされたら
      $('.s_07 .accordion_one .accordion_header').click(function(){
        //クリックされた.accordion_oneの中の.accordion_headerに隣接する.accordion_innerが開いたり閉じたりする。
        $(this).next('.accordion_inner').slideToggle();
        $(this).toggleClass("open");
      });
    });
</script>
<?php include 'footer.php' ?>
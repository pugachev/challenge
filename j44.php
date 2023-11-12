<?php include 'header.php' ?>
<?php

?>
<style>
  .form {
    display: flex;
    flex-direction: column;
    margin: 30px auto;
  }

  /** 部品側の定義 */
  .bijin {
    text-align: center;
    display: flex;
    align-items: center;
    font-size: 24px;
  }

  .flex_test-box {
    background-color: #eee;     /* 背景色指定 */
    padding:  10px;             /* 余白指定 */
    display: flex;
  }

  .flex_test-item {
      padding: 10px;
      color:  #fff;               /* 文字色 */
      margin:  10px;              /* 外側の余白 */
      border-radius:  5px;        /* 角丸指定 */
  }

</style>
<script>

    $(document).ready(function(){

      let bdisabledflag = false;

      $(document).click(function(event) {
        if(!$(event.target).closest('#mbutton').length) {
          if($("#left").val().length==0 || $("#right").val().length==0){
            bdisabledflag=true;
            $("#mbutton").attr("disabled",true);
          }else{
            bdisabledflag=false;
            $("#mbutton").attr("disabled",false);
          }
        }
      });
    });
</script>
  <main>
    <div class="container">
      <div class="flex_test-box">
        <div class="flex_test-item">
            <input type="text" id="left">
        </div>
        <div class="flex_test-item">
          <input type="text" id="right">
        </div>
        <div class="flex_test-item">
          <input type="button" id="mbutton" value="ボタン">
        </div>
      </div>
  </div>
  </main>

<?php include 'footer.php' ?>
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
      width:50%;
  }
  .tooltip {
    position: absolute;
    background-color: #333;
    color: #fff;
    padding: 5px;
    border-radius: 5px;
  }
</style>
<script>
  // テキストボックスがクリックされたときに呼び出される関数
  function showTooltip() {
    // ツールチップの内容を設定
    var tooltipText = "これはツールチップです。";

    // ツールチップ要素を作成
    var tooltip = document.createElement("div");
    tooltip.className = "tooltip";
    tooltip.textContent = tooltipText;

    // テキストボックスの位置にツールチップを配置
    var textBox = document.getElementById("myTextBox");
    var textBoxRect = textBox.getBoundingClientRect();
    tooltip.style.left = textBoxRect.left + "px";
    tooltip.style.top = textBoxRect.top - tooltip.offsetHeight + "px";

    // ドキュメントにツールチップを追加
    document.body.appendChild(tooltip);
  }
  $(document).ready(function(){
  // テキストボックスにクリックイベントリスナーを追加
  var textBox = document.getElementById("myTextBox");
  textBox.addEventListener("click", showTooltip);
  });
</script>

  <main>
    <div class="container">
        <div class="wrap">
            <div class="content">
            <input type="text" id="myTextBox" />
            </div> 
        </div>
    </div>
  </main>

<?php include 'footer.php' ?>
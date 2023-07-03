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
    background-color: #000;
    color: #fff;
    padding: 5px;
  }
</style>
<script>
    $(document).ready(function(){

            // クリックイベントを監視します
            $(document).on("click", function(event) {
              // クリックされた要素を取得します
              var targetElement = $(event.target);

              // クリックされた要素がツールチップ要素自体でない場合、ツールチップを非表示にします
              if (!targetElement.is($('.tooltip')) && !targetElement.is($('#tgt'))) {
                $('.tooltip').css('display', 'none');
              }
            });


            $('#tgt').click(function(){
              let textBoxRect = $('#result')[0].getBoundingClientRect();
              // ツールチップを表示する処理をここに記述する
              var tooltip = document.createElement('div');
              tooltip.innerText = this.getAttribute('title');
              tooltip.classList.add('tooltip');
              tooltip.style.left = textBoxRect.left + 10 + "px";
              tooltip.style.top = textBoxRect.top - 20 + "px";
              this.appendChild(tooltip);
              return false;
            });

    });
</script>
  <main>
    <div class="container">
        <div class="wrap">
            <div class="content">
              <div class="btn-container">
                <button id="tgt" title="Copied">Copied</button>
                <input type="text" id="result">
              </div>
            </div> 
        </div>
    </div>
  </main>

<?php include 'footer.php' ?>
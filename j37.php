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
    top: 100%;
    left: 0;
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

          document.querySelector('button').addEventListener('click', function() {
            // ツールチップを表示する処理をここに記述する
            var tooltip = document.createElement('div');
            tooltip.innerText = this.getAttribute('title');
            tooltip.classList.add('tooltip');
            this.appendChild(tooltip);
            return false;
          });

          // $(document).on('touchend click', function(e) {
          //       $('.tooltip').css('display', 'none');
          //       console.log(0);
          //   });
    });
</script>
  <main>
    <div class="container">
        <div class="wrap">
            <div class="content">
              <div class="btn-container">
                <button id="tgt" title="これはツールチップです">Copied</button>
                <input type="text" id="result">
              </div>
            </div> 
        </div>
    </div>
  </main>

<?php include 'footer.php' ?>
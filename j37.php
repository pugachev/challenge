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
    background-color: #BDBDB7;
    color: #fff;
    padding: 5px;
  }
</style>
<script>
    function maketooltip(result){
        // ツールチップ作成
        let tooltip = document.createElement('div');
        tooltip.innerText = 'Copied';
        tooltip.classList.add('tooltip');
        tooltip.onclick="alert('Hello')";
        tooltip.style.left = result.getBoundingClientRect().left + 10 + "px";
        tooltip.style.top = result.getBoundingClientRect().top - 35 + "px";
        return tooltip;
    }

    $(document).ready(function(){
            $(document).on("click", function(event) {
              var targetElement = $(event.target);
              console.log(targetElement);
              if (!targetElement.is($('#tgt1')) || !targetElement.is($('#tgt2')) || !targetElement.is($('#tgt3')) ) {
                $('.tooltip').css('display', 'none');
              }
            });
            $('#tgt1').click(function(){
              $('#result1')[0].before(maketooltip($('#result1')[0]));
              return false;
            });
            $('#tgt2').click(function(){
              $('#result2')[0].before(maketooltip($('#result2')[0]));
              return false;
            });
            $('#tgt3').click(function(){
              $('#result3')[0].before(maketooltip($('#result3')[0]));
              return false;
            });
    });
</script>
  <main>
    <div class="container">
        <div class="wrap">
            <div class="content">
              <div class="btn-container">
                <button id="tgt1">Copiedボタン1</button>
                <input type="text" id="result1">
              </div>
              <br>
              <div class="btn-container">
                <button id="tgt2">Copiedボタン2</button>
                <input type="text" id="result2">
              </div>
              <br>
              <div class="btn-container">
                <button id="tgt3">Copiedボタン3</button>
                <input type="text" id="result3">
              </div>
              <br>
            </div> 
        </div>
    </div>
  </main>

<?php include 'footer.php' ?>
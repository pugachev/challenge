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
  .btn-container {
  text-align: center;
}

button {
  width: 80%;
  height: 50px;
  font-size: 18px;
  font-weight: bold;

  /* ボタンにカーソルを当てると、カーソルがポインターに変わる */
  cursor: pointer;
}

/* ボタンにカーソルを当てたとき、ボタンを半透明にする */
button:hover {
 opacity: 0.7;
}

/* ポップアップメッセージを隠す */
.hidden {
  display: none;
}

/* ポップアップメッセージを画面右下に配置 */
#btn4-text {
  height: 72px;
  padding: 8px 16px;
  border-radius: 8px;
  background: #ddd;
  font-weight: bold;
  text-align: center;
  line-height: 72px;
  position: fixed;
  /* right: 5%;
  bottom: 10%; */
}

/* ポップアップアニメーションを3秒かけて実行 */
.popup-message {
  animation: popup 3s forwards;
}

@keyframes popup {
  0% {
    transform: translateY(15%);
    opacity: 0;
  }
  10%, 90% {
    transform: none;
    opacity: 1;
  }
  100% {
    transform: translateY(15%);
    opacity: 0;
    pointer-events: none;
  }
}
</style>
<script>
    $(document).ready(function(){
      const btn4Text = document.getElementById('btn4-text');
      const btn4 = document.getElementById('btn4');

      btn4.addEventListener('click', () => {
        btn4Text.classList.remove('hidden');
        btn4Text.classList.add('popup-message');
      });

      btn4Text.addEventListener('animationend', () => {
        btn4Text.classList.remove('popup-message');
        btn4Text.classList.add('hidden');
      });
    });
</script>
  <main>
    <div class="container">
        <div class="wrap">
            <div class="content">
            <div class="btn-container">
              <button id="btn4">ボタン４</button>
            </div>
            <p id="btn4-text" class="hidden">Copied!</p>
            </div> 
        </div>
    </div>
  </main>

<?php include 'footer.php' ?>
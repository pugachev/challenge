<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<pre><code class="language-php">
[対象を回転させるのとプログレスバーを進めるのは別なお話]
<div class="rotating progress" id="progress"></div> ←今回のターゲット

@keyframes rotating {
  from {
    transform: rotate(0deg);←0度から
  }
  to {
    transform: rotate(360deg);←360度までを
  }
}
.rotating {
  animation: rotating 2s linear infinite;←2秒間で行う 同じ勢いで 無限に※8000msecで全部塗りつぶしてるから止まって見えるだけ！
  transform-origin: 50% 50%;←こうしたら中心をとれるらしい
}

//ここからがprogressbar.jsの設定

//画面が読み込まれてから
window.onload = function onLoad() {
    var circle = new ProgressBar.Circle('#progress', {←上のid
        color: '#F0F',
        trailColor: '#eee',
        strokeWidth: 10,
        duration: 2500,
        easing: 'easeInOut'
    });

    circle.set(0.05); ←最初のプログレスバーの幅(0.05)

    setTimeout(function() {
        circle.animate(0.3);←1000sec経ってからのプログレスバーの幅(0.3)
    }, 1000);

    setTimeout(function() {
        circle.animate(0.4);←3500sec経ってからのプログレスバーの幅(0.4)
    }, 3500);

    setTimeout(function() {
        circle.animate(0.8);←5500sec経ってからのプログレスバーの幅(0.8)
    }, 5500);

    setTimeout(function() {
        circle.animate(1);←8000sec経ってからのプログレスバーの幅(1.0) ※塗りつぶしてるから分かり難いだけでスピナーはずっと回転してる
    }, 8000);

};


</code></pre>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js" integrity="sha512-TbHaMJHEmRBDf9W3P7VcRGwEmVEJu7MO6roAE0C4yqoNHeIVo3otIX3zj1DOLtn7YCD+U8Oy1T9eMtG/M9lxRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-sv0slik/5O0JIPdLBCR2A3XDg/1U3WuDEheZfI/DI5n8Yqc3h5kjrnr46FGBNiUAJF7rE4LHKwQ/SoSLRKAxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
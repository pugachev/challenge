<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>progressbar.jsの使い方</title>
<style>
.progress {
    height: 80px;
    width: 80px;
    margin: 50px auto;
}
.progress > svg {
    height: 100%;
    display: block;
}
@keyframes rotating {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
.rotating {
  animation: rotating 2s linear infinite;
  transform-origin: 50% 50%;
}
</style>

</head>
<body>
  <div style="margin:0,auto">
    <div class="rotating progress" id="progress"></div>
  </div>


<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.js"></script>
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<script>
window.onload = function onLoad() {
    var circle = new ProgressBar.Circle('#progress', {
        color: '#F0F',
        trailColor: '#eee',
        strokeWidth: 10,
        duration: 2500,
        easing: 'easeInOut'
    });

    circle.set(0.05);

    setTimeout(function() {
        circle.animate(0.3);
    }, 1000);

    setTimeout(function() {
        circle.animate(0.4);
    }, 3500);

    setTimeout(function() {
        circle.animate(0.8);
    }, 5500);

    setTimeout(function() {
        circle.animate(1);
    }, 8000);
};

</script>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8" />
<link rel="stylesheet"  href="style.css">
<title></title>
</head>
<body>

<canvas id="myChart"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var context = document.getElementById('myChart');
var chart = new Chart(ctx, {
    // 作成したいチャートのタイプ
    type: 'bar',

    // データセットのデータ
    data: {
        labels: ["1月", "2月", "3月", "4月", "5月", "6月", "7月"],
        datasets: [{
            label: "初めてのデータセット",
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    },

    options: {}
});

context.addEventListener( 'click', function( evt ){
    var item = chart.getElementAtEvent( evt );
    if( item.length == 0 ){
        return;
    }

    item = item[0];
    var index = item._index;
    var item_data = item._chart.config.data.datasets;
    alert( item_data[0]['data'][index] );
});
</script>

</body>
</html>
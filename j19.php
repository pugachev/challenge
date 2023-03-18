<?php
$dataarray=[20,35,40,30,45,35,40];
$json_array = json_encode($dataarray);

$data = array(
  'fruits' => array( 
    'apple',
    'banana',
    'cherry'
  ),
  'vegetable' => array( 
    'carot',
    'cabbage',
  ),
);
$json = json_encode($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@next/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
</head>
<body>
<div style="width:1000px;margin:0 auto;">
  <canvas id="mychart"></canvas>
</div>
<script>
$(document).ready(function(){
  let array = <?php echo $json; ?>;
  for(let key in array){
    if(Array.isArray(array[key])){
      console.log('key='+key);
      for(let key2 in array[key]){
        console.log('key2='+key2+'   '+array[key][key2]);
      }
    }
  }
  let ctx = $("#mychart");
  let myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      datasets: [{
        label: 'Green',
        data: <?php echo $json_array; ?>,
        borderColor: '#00793d',
      }],
    },
    options: {
      y: {
        min: 0,
        max: 60,
      },
    },
  });
});

</script>
</div>

</body>
</html>
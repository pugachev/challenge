<?php include 'header.php' ?>
<?php
$qfd=new QueryFemaleData();
$results = $qfd->getFemaleData();
$qad=new QueryAgeData();
$agelist = $qad->getAgeData();
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
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js"></script>
<link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v4/jexcel.css" type="text/css" />
<script src="https://jsuites.net/v4/jsuites.js"></script>
<link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
<script>
    $(function() {

    });
</script>
  <main>
    <div id="spreadsheet"></div>
    <input type="button" value="Add new row" onclick="$('#spreadsheet').jspreadsheet('insertRow')" />
  </main>
<script>
var options = {
    minDimensions:[10,10],
    tableOverflow:true,
}
 
$('#spreadsheet').jspreadsheet(options); 
</script>


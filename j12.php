<?php
// include("./jpgraph/src/jpgraph.php");
// include("./jpgraph/src/jpgraph_bar.php");
include("./jpgraph/src/jpgraph.php");
include("./jpgraph/src/jpgraph_bar.php");
try{
  
// 縦軸のデータ
$x_data = array(1,5,10);
 
// グラフの生成
$graph = new Graph(400, 300);
$graph->SetScale('textlin');
 
$graph->SetMarginColor('white');
 
// タイトル
$graph->title->Set('samurai_graph');
 
// グラフ表示
$bar = new BarPlot($x_data);
$bar->value->Show();
$graph->Add($bar);
$graph->Stroke();

}catch(Exception $ex){
  error_log($ex->getMessage());
}

?>

<?php
include("./lib/jpgraph/src/jpgraph.php");
include("./lib/jpgraph/src/jpgraph_line.php");
try{
  
// データ
$labelx = array("05", "06", "07", "08", "09", "10");
$data1  = array(7913,7777,8793,3190,0);

// Y軸用のコールバック関数
function yScaleCallback($aVal) {
    return number_format($aVal);
}

// グラフオブジェクトの生成
$graph = new Graph(800,700,"auto");

// 画像フォーマット
$graph->img->SetImgFormat("jpeg");
$graph->img->SetQuality(100);
// マージン left, right, top, bottom
$graph->img->SetMargin(80,40,70,40);
$graph->SetScale("textint");
$graph->SetFrame(false);
$graph->SetColor('lightblue');

// X,Y軸
$graph->xaxis->SetTickLabels($labelx);//x軸
$graph->yaxis->SetLabelFormatCallback('yScaleCallback');
$graph->yaxis->SetTextLabelInterval(2);
$graph->yaxis->HideZeroLabel();
$graph->yaxis->SetTitleMargin(55);
$graph->yaxis->title->Set('Y-axis');
$graph->yaxis->title->SetAngle(0);
$graph->xaxis->title->Set('X-axis');


// グリッド
$graph->xgrid->Show(true,false);
$graph->ygrid->SetFill(true,'#EFEFFF@0.5','#DDEEFF@0.5');


// 陸の交通手段
$legend1 = mb_convert_encoding("Land","UTF-8");
$p1 = new LinePlot($data1);
$p1->mark->SetType(MARK_FILLEDCIRCLE);
$p1->mark->SetFillColor("blue");
$p1->mark->SetWidth(3);
$p1->SetColor("blue");
$p1->SetCenter();
$p1->SetLegend($legend1);
$graph->Add($p1);

// グラフの描画
$graph->Stroke();

}catch(Exception $ex){
  error_log($ex->getMessage());
}

?>

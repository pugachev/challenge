<?php
include __DIR__.'/lib/connect.php';
include __DIR__.'/lib/queryFemaleData.php';
include __DIR__.'/lib/queryAgeData.php';
?>
<?php
session_start();
$rcvage = file_get_contents('php://input');
$qfd=new QueryFemaleData();
$results = $qfd->getFemaleDataByAge($rcvage);
echo json_encode(mb_convert_encoding($results,"utf-8","auto"));
?>
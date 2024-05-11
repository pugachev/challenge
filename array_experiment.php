<?php
// $nested_array = array();

// for ($i = 0; $i < 3; $i++) {
//     $sub_array = array();
    
//     for ($j = 0; $j < 3; $j++) {
//         $sub_array[] = $i * 3 + $j + 1;
//     }
    
//     $nested_array[] = $sub_array;
// }

// // 入れ子の配列を表示
// print_r($nested_array);

$result = array();
$courses = array(
    array("courseid"=>10000,"coursename"=>"焼き肉定食(10000円)"),
    array("courseid"=>10001,"coursename"=>"焼き肉定食(12000円)")
);
$subcate = array("subcateid"=>1000,"subcatename"=>"焼き肉",$courses);
$cate = array("cateid"=>100,"catename"=>"神戸牛",$subcate);

var_dump($cate);
<?php

function MultiColumn ($values, $keys = [], $filter = null) {
    if (is_array($keys) && empty($keys) || $keys === null) {
        return $values;
    }
    $enable_filter = $filter !== null && is_callable($filter);
    $keys = (array) $keys;
    $ret = [];
    foreach ($values as $row) {
        $tmp =& $ret;
        foreach ($keys as $key) {
            $tmp =& $tmp[$row[$key]];
        }
        if ($enable_filter) {
            $row = $filter($row);
        }
        $tmp = $row;
    }
    return $ret;
}

$tgt = [];
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2000,"subcatename"=> "焼き肉","courseid"=>3000,"coursename"=>"神戸牛焼き肉(10000円)");
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2000,"subcatename"=> "焼き肉","courseid"=>3003,"coursename"=>"神戸牛焼き肉(12000円)");
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2001,"subcatename"=> "せいろ蒸し","courseid"=>3001,"coursename"=>"神戸牛せいろ蒸し(12000円)");
$tgt[] = array("cateid"=>1001,"catename"=>"黒毛和牛","subcateid"=>2004,"subcatename"=> "せいろ蒸し","courseid"=>3002,"coursename"=>"黒毛和牛せいろ蒸し(8000円)");

$result = [];
foreach ($tgt as $row) {
    $category = $row['cateid'].'_'.$row['catename'];
    $subcategory = $row['subcateid'].'_'.$row['subcatename'];
    // キーが同じなら追加 キーが新規なら新たに連想配列を作成する
    $result[$category][$subcategory] = $row['courseid'].'_'.$row['coursename'];
}
// $result = MultiColumn($tgt, ['cateid', 'subcateid']);

print_r($result);
// function array_multi_columns(array $array, array $index_keys){
//     return array_map(fn(...$row) => array_combine($index_keys, $row), ...array_map(fn($key) => array_column($array, $key), $index_keys));
// }

// var_dump(array_multi_columns($tgt,["cateid","subcateid"]));

// function chk_cateid($value) {
//     return $value === 1000;
// }

// var_dump(array_filter(array_column($tgt, 'cateid'), 'not_is_false'));
// foreach($tgt as $val){
// //     var_dump($val).PHP_EOL;
//     $result = array_filter($val, function ($key) {
//         //文字数が4のキーを取得
//         var_dump($key).PHP_EOL;
// //         echo $val['cateid'].PHP_EOL;
// //         return $val['cateid']=== 1000;
//     });
    
// }

    
//     print_r($result);

// $cateidArray = array_column($tgt, 'subcateid','cateid');
// var_dump($cateidArray);
// echo PHP_EOL;

// $subcateidArray = array_column($tgt, 'subcateid');
// var_dump($subcateidArray);
// echo PHP_EOL;

// // print_r($tgt);

// $keys = array_column($tgt, "神戸牛");
// print_r($keys);


// $keyIndex = array_search(1000, array_column($tgt, 'cateid',false));
// var_dump($keyIndex);
// $result = $tgt[$keyIndex];

// var_dump($result);


// $scores = [
//     'taguchi' => 80,
//     'hayashi' => 70,
//     'kikuchi' => 60,
//     'honda' => 70,
// ];
// // echo array_search(70, $scores) . PHP_EOL;
// $keys = array_keys($scores, 70);
// print_r($keys);


// $arrays = [
//     0 => [
//         'id' => 1,
//         'name' => 'Tanaka',
//         'age' => 30,
//     ],
//     1 => [
//         'id' => 2,
//         'name' => 'Yamada',
//         'age' => 25,
//     ],
//     2 => [
//         'id' => 3,
//         'name' => 'Satou',
//         'age' => 20,
//     ],
//     3 => [
//         'id' => 4,
//         'name' => 'Hayashi',
//         'age' => 25,
//     ],
// ];

// $nameArray = array_column($arrays, 'name');
// var_dump($nameArray);
// echo PHP_EOL;

// $nameArray2 = array_column($arrays, 'age');
// var_dump($nameArray2);
// echo PHP_EOL;

// $result = array_search('Satou', $nameArray);
// var_dump($result);

// $result2 = array_search(25, $nameArray2);
// var_dump($result2);


<?php
//予想される配列
// コースの配列
// カテゴリ
$category = [];
// サブカテゴリ
$subcategory = [];
// コース
$courses = [];

// $tgt = array(
//             array(
//                 "cateid"=>100,
//                 "catename" =>"神戸牛",
//                 array(
//                         array(
//                                 "subcateid"=>1000,
//                                 "subcatename"=> "焼き肉",
//                                     array(
//                                         "courseid"=>10000,
//                                         "coursename"=>"焼肉定食(1000円)"
//                                     ),
//                                     array(
//                                         "courseid"=>10001,
//                                         "coursename"=>"焼肉定食(1100円)"
//                                     )
//                             ),
//                         array(
//                                 "subcateid"=>1001,
//                                 "subcatename"=> "せいろ蒸し",
//                                 array(
//                                     "courseid"=>10002,
//                                     "coursename"=>"せいろ蒸し(800円)"
//                                 ),
//                                 array(
//                                     "courseid"=>10003,
//                                     "coursename"=>"せいろ蒸し(1500円)"
//                                 )
//                         )
//                     )
//                 ),
//             array(
//                 "cateid"=>101,
//                 "catename" =>"黒毛和牛",
//                 array(
//                     array(
//                         "subcateid"=>2000,
//                         "subcatename"=> "焼き肉",
//                         array(
//                             "courseid"=>20000,
//                             "coursename"=>"焼肉定食(1000円)"
//                         ),
//                         array(
//                             "courseid"=>20001,
//                             "coursename"=>"焼肉定食(1100円)"
//                         )
//                     ),
//                     array(
//                         "subcateid"=>2001,
//                         "subcatename"=> "せいろ蒸し",
//                         array(
//                             "courseid"=>20002,
//                             "coursename"=>"せいろ蒸し(800円)"
//                         ),
//                         array(
//                             "courseid"=>20003,
//                             "coursename"=>"せいろ蒸し(1500円)"
//                         )
//                     )
//                 )
//             ),
//             );

$tgt = [];
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2000,"subcatename"=> "焼き肉","courseid"=>3000,"coursename"=>"神戸牛焼き肉(10000円)");
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2000,"subcatename"=> "焼き肉","courseid"=>3003,"coursename"=>"神戸牛焼き肉(12000円)");
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2001,"subcatename"=> "せいろ蒸し","courseid"=>3001,"coursename"=>"神戸牛せいろ蒸し(12000円)");
$tgt[] = array("cateid"=>1001,"catename"=>"黒毛和牛","subcateid"=>2004,"subcatename"=> "せいろ蒸し","courseid"=>3002,"coursename"=>"黒毛和牛せいろ蒸し(8000円)");

// var_dump($tgt);
$previous_cateid = "";
$previous_catename = "";
$previous_subcateid = "";
$previous_subcatename = "";

$result =[];
$cate = [];
$subcate = [];
$courses = [];

// $courses = array(
//     array("courseid"=>10000,"coursename"=>"焼き肉定食(10000円)"),
//     array("courseid"=>10001,"coursename"=>"焼き肉定食(12000円)")
// );
// $subcate = array("subcateid"=>1000,"subcatename"=>"焼き肉",$courses);
// $cate = array("cateid"=>100,"catename"=>"神戸牛",$subcate);


foreach ($tgt as  $value) {
//     echo 'debug0 '.$value['cateid'].'  '.$value['catename'].'  '.$value['subcateid'].'  '.$value['subcatename'].'  '.$value['courseid'].'  '.$value['coursename'].PHP_EOL;
    if($previous_cateid!="" && $previous_cateid == $value['cateid']){
        // カテゴリが同じ場合
        if($previous_subcateid == $value['subcateid']){
            //　サブカテゴリが同じ場合
            $course[] = array($value['courseid']=>$value['coursename']);
            echo "debug1".PHP_EOL;
        }else{
            //　サブカテゴリが異なる場合
            $subcate = array($previous_subcateid=>$previous_subcatename,$course);
            if($previous_cateid!="" && $previous_cateid == $value['cateid']){
                $cate[] = array($previous_cateid=>$previous_catename,$subcate);
            }
            $course = array($value['courseid']=>$value['coursename']);
            
//             echo "debug2".PHP_EOL;
        }
    }else if($previous_cateid!="" && $previous_cateid != $value['cateid']){
        // カテゴリが異なる場合
        $cate[] = array($previous_cateid=>$previous_catename,$subcate);
        echo "debug3".PHP_EOL;
    }else if($previous_cateid==""){
        // 初回はここを通る
        $course[] = array($value['courseid']=>$value['coursename']);
        echo "debug4".PHP_EOL;
    }
    
    $previous_cateid = $value['cateid'];
    $previous_catename = $value['catename'];
    $previous_subcateid = $value['subcateid'];
    $previous_subcatename = $value['subcatename'];
    
//     echo 'debug5 '.$value['cateid'].'  '.$value['catename'].'  '.$value['subcateid'].'  '.$value['subcatename'].'  '.$value['courseid'].'  '.$value['coursename'].'  previous_cateid='.$previous_cateid.'  previous_subcateid='.$previous_subcateid.PHP_EOL;
}
echo PHP_EOL;
var_dump($cate);
   
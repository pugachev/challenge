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



// var_dump($tgt);
$previous_cateid = "";
$previous_catename = "";
$previous_subcateid = "";
$previous_subcatename = "";

$result =[];
$cate = [];
$subcate = [];
$courses = [];

$tgt = [];
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2000,"subcatename"=> "焼き肉","courseid"=>3000,"coursename"=>"神戸牛焼き肉(10000円)");
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2000,"subcatename"=> "焼き肉","courseid"=>3003,"coursename"=>"神戸牛焼き肉(12000円)");
$tgt[] = array("cateid"=>1000,"catename"=>"神戸牛","subcateid"=>2001,"subcatename"=> "せいろ蒸し","courseid"=>3001,"coursename"=>"神戸牛せいろ蒸し(12000円)");
$tgt[] = array("cateid"=>1001,"catename"=>"黒毛和牛","subcateid"=>2004,"subcatename"=> "せいろ蒸し","courseid"=>3002,"coursename"=>"黒毛和牛せいろ蒸し(8000円)");

foreach ($tgt as  $value) {
    // カテゴリが同じ場合
    if($previous_cateid!="" && $previous_cateid == $value['cateid']){
        //　サブカテゴリが同じ場合
        if($previous_subcateid == $value['subcateid']){ 
            $course[] = array($value['courseid']=>$value['coursename']);
            echo 'debug0  courses '.var_dump($course).PHP_EOL;
        }else{
            //　サブカテゴリが異なる場合 それまでのコース一覧とサブカテゴリをカテゴリに登録する
            echo 'debug1 subcate  '.var_dump($subcate).PHP_EOL;
            $subcate = array($previous_subcateid=>$previous_subcatename,$course);
            echo 'debug2 course  '.var_dump($course).PHP_EOL;
            echo 'debug3 previous_subcateid='.$previous_subcateid.'  previous_subcatename='.$previous_subcatename.PHP_EOL;
            echo 'debug4 subcate  '.var_dump($subcate).PHP_EOL;
            echo 'debug5 previous_subcateid='.$previous_subcateid.'  previous_subcatename='.$previous_subcatename.PHP_EOL;
            $cate[] = array($previous_cateid=>$previous_catename,$subcate);
            
            echo 'debug6 cate  '.var_dump($cate).PHP_EOL;
        }
    }else if($previous_cateid!="" && $previous_cateid != $value['cateid']){
        // カテゴリが異なる場合
        $cate[] = array($previous_cateid=>$previous_catename,$subcate);
        echo 'debug7  cate '.var_dump($cate).PHP_EOL;
    }else if($previous_cateid==""){
        // 初回はここを通る
        $course[] = array($value['courseid']=>$value['coursename']);
        echo 'debug8  courses '.var_dump($course).PHP_EOL;
    }
    
    $previous_cateid = $value['cateid'];
    $previous_catename = $value['catename'];
    $previous_subcateid = $value['subcateid'];
    $previous_subcatename = $value['subcatename'];
    
    echo 'debug8 '.$value['cateid'].'  '.$value['catename'].'  '.$value['subcateid'].'  '.$value['subcatename'].'  '.$value['courseid'].'  '.$value['coursename'].'  previous_cateid='.$previous_cateid.'  previous_subcateid='.$previous_subcateid.PHP_EOL;
}
echo PHP_EOL;
// var_dump($cate);
   
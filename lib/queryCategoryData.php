<?php

// include 'model/financialData.php';
// include 'C:\xampp\htdocs\challenge\model\femaleData.php';
// include '/Applications/MAMP/htdocs/challenge/model/femaleData.php';

class QueryCategory extends connect{
    private $financialdata;

    public function __construct()
    {
        parent::__construct();
    }

    public function setFinancialData(FinancialData $financialdata)
    {
        $this->financialdata = $financialdata;
    }

    public function getCategoryData(){
        $stmt = $this->dbh->prepare("select c.cateid as cateid, test.catename as catename, c.subcateid as subcateid, test.subcatename as subcatename, c.courseid as courseid, c.coursename as coursename from courses as c left join ( select ct.cateid as cateid, ct.catename as catename, sct.subcateid as subcateid, sct.subcatename as subcatename from category as ct left join sub_category as sct on  ct.cateid = sct.cateid order by ct.cateid, sct.subcateid ) as test on  c.cateid = test.cateid and c.subcateid = test.subcateid");
        $stmt->execute();
        return $this->setCategoryAllData($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function setCategoryAllData($data){
        var_dump($data);
        $tmp=array();
        $previous_cateid="";
        $previous_subcateid="";
        $course = [];
        foreach($data as $val){
            // カテゴリIDを集める
            $current_cateid = $val['cateid'];
            // サブカテゴリIDを集める
            $current_subcateid = $val['subcateid'];
            
            // コースIDを集める
            
            
            // // 前の値と現在の値を使って何かを行う
            // if ($current_cateid !== null) {
            //     // カテゴリIDが前回と同じ
            //     if ($current_cateid == $previous_cateid){
            //         // サブカテゴリIDが前回と同じ
            //         if(){

            //         }
            //     }   
            // }else{
            //     // カテゴリIDが初回の場合は無条件で全てを入れる

            // }
            
            // 現在の値を一時変数に代入し、次の反復のために前の値を更新する
            $previous_cateid = $current_cateid;
            $previous_subcateid = $current_subcateid;

            //カテゴリが同じ
                //サブカテゴリが同じ
                    //コースを集める
                //サブカテゴリが異なる
                    //この瞬間にカテゴリとサブカテゴリに対してコース配列を追加する
                    
            //カテゴリが異なる



            // $tmp[] = array(
            //     'cateid'=>$val['cateid'],
            //     'catename'=>$val['catename'],
            //     'subcateid'=>$val['subcateid'],
            //     'subcatename'=>$val['subcatename'],
            //     'courseid'=>$val['courseid'],
            //     'coursename'=>$val['coursename']
            // );
        }
        return $tmp;
    }

}
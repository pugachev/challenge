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
        $stmt = $this->dbh->prepare("select c.courseid, c.coursename, ct.cateid, ct.catename, sct.subcateid, sct.subcatename from courses as c left join category as ct on  c.cateid = ct.cateid left join sub_category as sct on  c.subcateid = c.subcateid order by ct.cateid, sct.subcateid, c.courseid");
        $stmt->execute();
        return $this->setFinancialAllData($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function setFinancialAllData($data){

        var_dump($data);
        // $tmp=array();
        // foreach($data as $val){
        //     // $fd = new FinancialData();
        //     // $fd->setId($val['id']);
        //     // $fd->setFinancialNumber($val['financialnumber']);
        //     // $fd->setItem($val['item']);
        //     // $fd->setPrice($val['price']);
        //     // $fd->setOutputFlg($val['outputflg']);

        //     // $tmp[] = $fd;
        //     $tmp[] = array(
        //         'id'=>$val['id'],
        //         'financialnumber'=>$val['financialnumber'],
        //         'item'=>$val['item'],
        //         'price'=>$val['price'],
        //         'outputflg'=>$val['outputflg'],
        //     );
        // }
        // return $tmp;
    }

}
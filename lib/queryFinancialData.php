<?php

include 'model/financialData.php';
// include 'C:\xampp\htdocs\challenge\model\femaleData.php';
// include '/Applications/MAMP/htdocs/challenge/model/femaleData.php';

class QueryFinancialData extends connect{
    private $financialdata;

    public function __construct()
    {
        parent::__construct();
    }

    public function setFinancialData(FinancialData $financialdata)
    {
        $this->financialdata = $financialdata;
    }

    public function getFinancialData(){
        $stmt = $this->dbh->prepare("SELECT * FROM financialreport");
        $stmt->execute();
        return $this->setFinancialAllData($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function setFinancialAllData($data){
        $tmp=array();
        foreach($data as $val){
            // $fd = new FinancialData();
            // $fd->setId($val['id']);
            // $fd->setFinancialNumber($val['financialnumber']);
            // $fd->setItem($val['item']);
            // $fd->setPrice($val['price']);
            // $fd->setOutputFlg($val['outputflg']);

            // $tmp[] = $fd;
            $tmp[] = array(
                'id'=>$val['id'],
                'financialnumber'=>$val['financialnumber'],
                'item'=>$val['item'],
                'price'=>$val['price'],
                'outputflg'=>$val['outputflg'],
            );
        }
        return $tmp;
    }

}
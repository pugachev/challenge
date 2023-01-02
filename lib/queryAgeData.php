<?php

include 'model/ageData.php';
// include 'C:\xampp\htdocs\challenge\model\ageData.php';
// include '/Applications/MAMP/htdocs/challenge/model/ageData.php';

class QueryAgeData extends connect{
    private $agedata;

    public function __construct()
    {
        parent::__construct();
    }

    public function setAgeData(AgeData $agedata)
    {
        $this->agedata = $agedata;
    }

    public function getAgeData(){
        $stmt = $this->dbh->prepare("SELECT * FROM age");
        $stmt->execute();
        return $this->setAgeAllData($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function setAgeAllData($data){
        $tmp=array();
        foreach($data as $val){
            $fd = new AgeData();
            $fd->setId($val['id']);
            $fd->setAgeValue($val['agevalue']);
            $fd->setAgeDisp($val['agedisp']);

            $tmp[] = $fd;
        }

        return $tmp;

    }


}
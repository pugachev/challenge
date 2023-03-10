<?php

include 'model/femaleData.php';
// include 'C:\xampp\htdocs\challenge\model\femaleData.php';
// include '/Applications/MAMP/htdocs/challenge/model/femaleData.php';

class QueryFemaleData extends connect{
    private $femaledata;

    public function __construct()
    {
        parent::__construct();
    }

    public function setFemaleData(FemaleData $femaledata)
    {
        $this->femaledata = $femaledata;
    }

    public function getFemaleData(){
        $stmt = $this->dbh->prepare("SELECT * FROM female");
        $stmt->execute();
        return $this->setFemaleAllData($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function getFemaleDataByAge($age){
        $stmt = $this->dbh->prepare("SELECT * FROM female where femaleage=".$age);
        $stmt->execute();
        return $this->setFemaleAllArrayData($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function setFemaleAllData($data){
        $tmp=array();
        foreach($data as $val){
            $fd = new FemaleData();
            // $fd->setId($val['id']);
            // $fd->setFemaleNumber($val['femalenumber']);
            // $fd->setFemaleName($val['femalename']);
            // $fd->setFemaleNote($val['femalenote']);
            $tmp[] = array('id'=>$val['femalenumber'],'value'=>$val['femalename']);
            // $tmp[] = $fd;
        }

        return $tmp;

    }

    public function setFemaleAllArrayData($data){
        $tmp=array();
        foreach($data as $val){

            // $fd = new FemaleData();
            // $fd->setId($val['id']);
            // $fd->setFemaleNumber($val['femalenumber']);
            // $fd->setFemaleName($val['femalename']);
            // $fd->setFemaleNote($val['femalenote']);

            $tmp[] = array('id'=>$val['femalenumber'],'value'=>$val['femalename']);
        }

        return $tmp;

    }

}
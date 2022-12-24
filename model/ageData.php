<?php

class AgeData{

    private $id = null;
    private $agevalue = null;
    private $agedisp = null;

    public function getId(){
        return $this->id;
    }

    public function getAgeValue(){
        return $this->agevalue;
    }

    public function getAgeDisp(){
        return $this->agedisp;
    }

    public function setId($val){
        $this->id = $val;
    }

    public function setAgeValue($val){
        $this->agevalue = $val;
    }

    public function setAgeDisp($val){
        $this->agedisp = $val;
    }
}
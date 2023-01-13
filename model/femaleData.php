<?php

class FemaleData{

    private $id = null;
    private $femalenumber = null;
    private $femalename = null;
    private $femalnote = null;
    private $femalage = null;

    public function getId(){
        return $this->id;
    }

    public function getFemaleNumber(){
        return $this->femalenumber;
    }

    public function getFemaleName(){
        return $this->femalename;
    }

    public function getFemaleNote(){
        return $this->femalnote;
    }

    public function getFemaleAge(){
        return $this->femalage;
    }

    public function setId($val){
        $this->id = $val;
    }

    public function setFemaleNumber($val){
        $this->femalenumber = $val;
    }

    public function setFemaleName($val){
        $this->femalename = $val;
    }

    public function setFemaleNote($val){
        $this->femalnote = $val;
    }

    public function setFemaleAge($val){
        $this->femalage = $val;
    }
}
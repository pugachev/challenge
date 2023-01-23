<?php
    class FinancialData {

        private $id = null;
        private $financialnumber = null;
        private $item = null;
        private $price = null;
        private $outputflg = null;


        public function getId(){
            return $this->id;
        }

        public function getFinancialNumber(){
            return $this->financialnumber;
        }

        public function getItem(){
            return $this->item;
        }
        
        public function getPrice(){
            return $this->price;
        }

        public function getOutputFlg(){
            return $this->outputflg;
        }

        public function setId($val){
            $this->id = $val;
        }

        public function setFinancialNumber($val){
            $this->financialnumber = $val;
        }

        public function setItem($val){
            $this->item = $val;
        }

        public function setPrice($val){
            $this->price = $val;
        }

        public function setOutputFlg($val){
            $this->outputflg = $val;
        }
    }



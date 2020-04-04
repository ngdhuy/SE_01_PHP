<?php
    include_once("./library.php");

    class Diary // Nhật ký
    {
        private $currentDate; //được lưu dưới dạng string
        private $action;
        private $amount;
        private $arrUnit = ["born" => "child", "eat" => "kg", "makeMilk" => "lit"]; //đơn vị tính


        public function __construct($action = "eat", $amount = 1)
        {
            //$this->currentDate = date('d-m-Y H:i:s');
            $this->currentDate = date('d-m-Y');
            $this->action = $action;
            $this->amount = $amount;
        }

        public function __destruct()
        {
        }

        public function diaryInformation()
        {
            //echo $this->currentDate + $this->action + $this->amount + $this->arrUnit[$this->action]; 
            echo $this->currentDate ."         ". $this->action ."           ".
                $this->amount ."           ". $this->arrUnit[$this->action] ."<br/>";
        }

        public function __get($keyName)
        {               
            if (isset($this->$keyName) && strcmp($keyName, "arrUnit") != 0)              
                return $this->$keyName;   
            else if(array_key_exists($keyName, $this->arrUnit))
                return $this->arrUnit[$keyName];                           
            else
                echo null;
        }

        public function __set($keyName, $value)
        {           
            if (isset($this->$keyName) && strcmp($keyName, "arrUnit") != 0)                
                    $this->$keyName = $value;                
            // else if(array_key_exists($keyName, $this->arrUnit))
            //     $this->arrUnit[$keyName] = $value;      
            else
                echo "attribute and keyName are not exist<br />";

        }
    }

?>
<?php
namespace Farm;
    class Activity{
    
        private $time;
        private $action;
        private $quantity;
        private $unit;
    
        public function __construct($action = "eat", $quantity = 1)
        {
            $this->time = date("H:i:s d-m-Y",time());
            $this->action = $action;
            $this->quantity = $quantity;
            switch($action){
                case "eat": $this->unit = "kg"; break;
                case "produceMilk": $this->unit = "L"; break;
                case "giveBirth": $this->unit = "child"; break;
            }
        }
    
        public function __destruct()
        {
            
        }
    
        public function __get($name)
        {
            if(isset($this->$name)){
                return $this->$name;
            }
        }
    
        public function __set($name, $value)
        {
            if(isset($this->$name)){
                $this->$name = $value;
            }
        }
    
        public function showActivityDetail(){
            echo "<div>- ".$this->action.": ".$this->quantity." ".$this->unit." | Time: ".$this->time."<div/>";
        }
    }
?>
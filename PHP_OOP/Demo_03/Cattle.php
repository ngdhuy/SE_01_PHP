<?php
namespace Farm;
include_once("Activity.php");

    abstract class Cattle { //Gia suc
        private $id; 
        private $name;
        private $gender;
        private $activityDiary = array();

        public function __construct($id = 0, $name = "", $gender = "Female")
        {
            $this->id = $id; 
            $this->name = $name;
            $this->gender = $gender;
        }

        public function __destruct()
        {

        }

        public function __get($attribute_name)
        {
            return $this->$attribute_name;
        }

        public function __set($attribute_name, $value)
        {
            if(isset($this->$attribute_name)){
                $this->$attribute_name = $value;
            } else { echo "Errol"; }
            
        }

        public function __isset($attribute_name) 
        {
            return isset($this->$attribute_name);
        }

        public function __unset($attribute_name)
        {
            unset($this->$attribute_name);
        }

        public function getInfo(){
            echo "***************<br \>";
            echo "Id: ".$this->id."<br \>";
            echo "Name: ".$this->name."<br \>";
            echo "Gender:".$this->gender."<br \>";
        }

        public function showActivityDiary(){
            $this->getInfo();
            echo "------Activities------<br>";
            if(isset($this->activityDiary)){
                foreach($this->activityDiary as $diary){
                    $diary->showActivityDetail();
                }
            } else {
                echo "<div>No-diary recoded.</div>";
            }
            
        }

        public function addActivityDiary($activity){
            if(isset($activity)){
                $this->activityDiary[] = $activity;
            } else {
                echo "Null";
            }
        }

        abstract public function makeSound();

        abstract public function eatGrass();

        abstract public function produceMilk();

        abstract public function giveBirth();

        abstract static public function getStatistic(); //Thống kê theo từng loài
        
    }    
?>
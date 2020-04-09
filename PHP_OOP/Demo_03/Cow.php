<?php
namespace Farm;
include_once("Activity.php");

class Cow extends Cattle{

        static public $count = 0;
        static public $milkProducedS = 0;
        static public $grassEatedS = 0;
        static public $numOfBornS = 0;

        public function __construct($id = 0, $name = "", $gender = true) 
        {
            parent::__construct($id, $name, $gender);
            Cow::$count++;
        }

        public function __destruct()
        {
            Cow::$count--;
        }

        public function __get($attribute_name)
        {
            return $this->$attribute_name;
        }

        public function __set($attribute_name, $value)
        {
            if(isset($this->$attribute_name))
            {
                $this->$attribute_name = $value;
            } else {
                echo "Errol";
            }
        }

        public function __isset($attribute_name) 
        {
            return isset($this->$attribute_name);
        }

        public function __unset($attribute_name)
        {
            unset($this->$attribute_name);
        }
        
        public function makeSound(){
            echo "<div>ID ".parent::__get("id").": Moo-Moo</div>";
        }

        public function eatGrass(){
            $eated = new Activity("eat", rand(1,5));
            parent::addActivityDiary($eated);
            Cow::$grassEatedS += $eated->quantity;
            echo "<div>ID: ".parent::__get("id")." - eated | Time: ".$eated->time."</div>";
        }

        public function produceMilk(){
            if(parent::__get("gender") == "Female"){
                $milkProduced = new Activity("produceMilk", rand(5,10));
                parent::addActivityDiary($milkProduced);
                Cow::$milkProducedS += $milkProduced->quantity;
                echo "<div>ID: ".parent::__get("id")." - milk produced | Time: ".$milkProduced->time."</div>";
            } else {
                echo "<div>ID: ".parent::__get("id")." - No-milk</div>";
            }
        }

        public function giveBirth(){
            if(parent::__get("gender" == "Female")){
                $numOfBorn = new Activity("giveBirth", rand(1,3));
                parent::addActivityDiary($numOfBorn);
                Cow::$numOfBornS += $numOfBorn->quantity;
                echo "<div>ID: ".parent::__get("id")." - gave birth | Time: ".$numOfBorn->time."</div>";
            } else {
                echo "<div>ID: ".parent::__get("id")." - No-Born</div>";
            }
        }

        static public function getStatistic(){
            echo "============<br \>";
            echo "Tổng số bò: ".Cow::$count;
            echo "<br \>Số cỏ đàn bò đã ăn: ".Cow::$grassEatedS;
            echo "<br \>Tổng số sữa bò: ".Cow::$milkProducedS;
            echo "<br \>Tổng số bò con: ".Cow::$numOfBornS."<br \>";
        }
    }

?>
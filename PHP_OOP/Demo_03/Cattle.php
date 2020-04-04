<?php
namespace Farm {
    abstract class Cattle {
        private $id; 
        private $name;
        private $gender;
        // public static $milkProducedS = 0;
        // public static $grassEatedS = 0;
        // public static $numOfBornS = 0;
        // public static $cattleCount = 0;

        public function __construct($id = 0, $name = "", $gender = true) 
        {
            $this->id = $id; 
            $this->name = $name;
            $this->gender = $gender;
            // if($this->gender){
            //     Cattle::milkProducedS = 0;
            //     Cattle::numOfBorn = 0;
            // } else {
            //     Cattle::__unset("milkProducedS");
            //     Cattle::__unset("numOfBornS");
            // }
            // Cattle::$cattleCount++;
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
            echo "--------------<br \>";
            echo "Id: ".$this->id."<br \>";
            echo "Name: ".$this->name."<br \>";
            if($this->gender){
                echo "Gender: Female<br \>";
                } else {
                    echo "Gender: Male<br \>";
            }
        }

        abstract public function makeSound();
        // {
        //     echo "<div>No-sound</div>";
        // }

        abstract public function eatGrass();
        // {
        //     echo "<div>Eat-Grass</div>";
        // }

        abstract public function produceMilk();
        // {
        //     echo "<div>Produce-Milk</div>";
        // }

        abstract public function giveBirth();

        abstract static public function getStatistic();
        
    }    
}
?>
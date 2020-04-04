<?php
namespace Farm{
    class Goat extends Cattle{

        static public $countGoat = 0;
        static public $milkProducedS = 0;
        static public $grassEatedS = 0;
        static public $numOfBornS = 0;

        public function __construct($id = 0, $name = "", $gender = true) 
        {
            parent::__construct($id, $name, $gender);
            Goat::$countGoat++;
        }

        public function __destruct()
        {
            Goat::$countGoat--;
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

        // public function getInfo(){
        //     echo "--------------<br \>";
        //     echo "Id: ".parent::__get("id")."<br \>";
        //     echo "Name: ".parent::__get("name")."<br \>";
        //     if(parent::__get("gender")){
        //         echo "Gender: Female<br \>";
        //         } else {
        //             echo "Gender: Male<br \>";
        //     }
            
        // }
        
        public function makeSound(){
            echo "<div>Bee-Bee</div>";
        }

        public function eatGrass(){
            $grassEated = rand(1,2);
            Goat::$grassEatedS += $grassEated;
            echo "<div>Eated:".$grassEated." kg</div>";
        }

        public function produceMilk(){
            if(parent::__get("gender")){
                $milkProduced = rand(2,4);
                Goat::$milkProducedS += $milkProduced;
                echo "<div>Milk produced: ".$milkProduced." L</div>";
            } else {
                echo "<div>No-Milk</div>";
            }
        }

        public function giveBirth(){
            if(parent::__get("gender")){
                $numOfBorn = rand(1,3);
                Goat::$numOfBornS += $numOfBorn;
                echo "<div>Borned: ".$numOfBorn." child</div>";
            } else {
                echo "<div>No-Born</div>";
            }
        }

        static public function getStatistic(){
            echo "============<br \>";
            echo "Tổng số dê: ".Goat::$countGoat;
            echo "<br \>Số cỏ đàn dê đã ăn: ".Goat::$grassEatedS;
            echo "<br \>Tổng số sữa dê: ".Goat::$milkProducedS;
            echo "<br \>Tổng số dê con: ".Goat::$numOfBornS."<br \>";
        }
    }
}

?>
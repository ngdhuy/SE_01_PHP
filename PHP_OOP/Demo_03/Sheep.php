<?php
namespace Farm{
    class Sheep extends Cattle{

        static public $countSheep = 0;
        static public $milkProducedS = 0;
        static public $grassEatedS = 0;
        static public $numOfBornS = 0;

        public function __construct($id = 0, $name = "", $gender = true) 
        {
            parent::__construct($id, $name, $gender);
            Sheep::$countSheep++;
        }

        public function __destruct()
        {
            Sheep::$countSheep--;
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
            echo "<div>Baa-Baa</div>";
        }

        public function eatGrass(){
            $grassEated = rand(1,3);
            Sheep::$grassEatedS += $grassEated;
            echo "<div>Eated:".$grassEated." kg</div>";
        }

        public function produceMilk(){
            if(parent::__get("gender")){
                $milkProduced = rand(3,6);
                Sheep::$milkProducedS += $milkProduced;
                echo "<div>Milk produced: ".$milkProduced." L</div>";
            } else {
                echo "<div>No-Milk</div>";
            }
        }

        public function giveBirth(){
            if(parent::__get("gender")){
                $numOfBorn = rand(1,3);
                Sheep::$numOfBornS += $numOfBorn;
                echo "<div>Borned: ".$numOfBorn." child</div>";
            } else {
                echo "<div>No-Born</div>";
            }
        }

        static public function getStatistic(){
            echo "============<br \>";
            echo "Tổng số cừu: ".Sheep::$countSheep;
            echo "<br \>Số cỏ đàn cừu đã ăn: ".Sheep::$grassEatedS;
            echo "<br \>Tổng số sữa cừu: ".Sheep::$milkProducedS;
            echo "<br \>Tổng số cừu con: ".Sheep::$numOfBornS."<br \>";
        }
    }
}

?>
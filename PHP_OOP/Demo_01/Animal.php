<?php 
    namespace MyFarm
    {
        class Animal 
        {
            var     $name;
            private $num_leg;

            static public  $count = 0;

            public function __construct()
            {
                $this->name = "Anomynous";
                $this->num_leg = 0;
                Animal::$count++;
            }

            public function __destruct()
            {
                Animal::$count--;
            }

            public function __get($num_leg) 
            {
                return $this->num_leg;
            }

            public function __set($num_leg, $value)
            {
                $this->num_leg = $value;
            }
        }
    }
?>
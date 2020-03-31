<?php 
    namespace Farm
    {
        class Dog extends Animal
        {
            private $color;

            public function __construct($id = 0, $name = "", $num_of_leg = 0, $color = "black")
            {
                parent::__construct($id, $name, $num_of_leg);
                $this->color = $color;
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
                if(isset($this->$attribute_name))
                    $this->$attribute_name = $value;
            }

            public function makeSound()
            {
                echo "<div>".parent::__get("name")." Gau gau ...</div>";
            }

            public function run() 
            {
                echo "<div>Dog is running</div>";
            }
        }
    }
?>
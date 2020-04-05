<?php
    namespace Farm {
        abstract class Animal 
        {
            private $id; 
            private $name;
            private $num_of_leg;

            public function __construct($id = 0, $name = "", $num_of_leg = 0) 
            {
                $this->id = $id; 
                $this->name = $name;
                $this->num_of_leg = $num_of_leg;        
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
                {
                    switch($attribute_name)
                    {
                        case "id":
                        case "num_of_leg":
                            if($value > 0)
                                $this->$attribute_name = $value;
                            else
                                echo "Error";
                        break;
                        case "name":
                            $this->$attribute_name = $value;
                        break;
                    }
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

            public function makeSound()
            {
                echo "<div>No-sound</div>";
            }

            abstract public function run();
        }
    }
?>
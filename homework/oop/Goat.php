<?php
    class Goat extends Beast //Con dê
    {
        public function __construct($weight = 0, $sex = "male")
        {
            parent::__construct($weight, $sex);
        }

        public function __destruct()
        {

        }

        public function __get($attributeName)
        {
            //return $this->$attributeName;
            parent::__get($attributeName);
        }

        public function __set($attributeName, $value)
        {
            parent::__set($attributeName, $value);
        }

        public function eat()
        {
            //return rand(1, 2);
            $diary = new Diary("eat", rand(1, 2));
            parent::__set("arrDiary", $diary);
        }

        public function makeHungrySound()
        {
            if (parent::isHungry())
                echo "I'm a goat. My id is ".parent::__get("id"). ". I'm hungry huwha! <br />";
            else
                echo  "I'm a goat. My id is ".parent::__get("id"). ". I don't want to eat!!! I'm full =) <br />";
        }

        public function makeSound()
        {
            echo "I'm a goat <br />";
        }

        public function makeMilk()
        {
            //return rand(2, 4);
            $diary = new Diary("makeMilk", rand(2, 4));
            parent::__set("arrDiary", $diary);
        }

        public function beastInformation()
        {
            echo "I'm a goat. My id is ".parent::__get("id"). ".<br />";
        }
    };

?>
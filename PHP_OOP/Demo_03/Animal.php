<?php

namespace Farm {
    abstract class Animal 
    {
        private $name;
        private $gender;
        private $speak;
        private $status;
        public $arr = array();
        public function __construct()
        {
            /*   $this->name = $name;
            $this->gender = $gender;
            $this->status = $status; */
        }
        public function __destruct()
        {
        }

        public function add($cattle)
        {
            $this->arr[] = $cattle;
        }

        public function makeSound()
        {   
        }
        
    }
}
?>
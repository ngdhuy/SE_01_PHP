<?php

namespace Farm {

    class Cow extends Animal
    {

        const tiengkeu = "bò";

        public function __construct()
        {
            parent::__construct();
            /*$this->name = $name;
        $this->gender = $gender;
        $this->status = $status; */
        }

        public function makeSound()
        {
            echo "<div> Ụm bò </div> ";
        }
    }
}
?>
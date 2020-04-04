<?php
    include_once("./library.php");

    abstract class Beast // gia súc
    {
        static public $num = 1; //Dùng để đánh dấu id
        private $id;
        private $weight;
        private $sex;
        private $arrDiary = array();

        public function __construct($weight = 0, $sex = "male")
        {
            $this->id = Beast::$num++;
            $this->weight = $weight;
            $this->sex = $sex;
        }

        public function __destruct()
        {
        }

        public function __get($keyName)
        {
            // if (strcmp($keyName, "arrDiary") === 0)
            //     return $this->arrDiary;   
            if (isset($this->$keyName))              
                return $this->$keyName;                         
            else
                return null;
        }

        public function __set($keyName, $value)
        {
            if (strcmp($keyName, "arrDiary") === 0)
                $this->arrDiary[] = $value;
            else if (isset($this->$keyName))                          
                $this->$keyName = $value;                
            else
                echo "attribute is not exist <br />";
        }

        public function born()
        {
            if (strcmp($this->sex, "female") == 0)
            {
                $diary = new Diary("born", rand(1, 3));
                $this->arrDiary[] = $diary;
            }               
            else 
                echo "No no no, I'm male <br />";  
        }

        public function diaryInformation($actionName = "")
        {
            if (empty($actionName))
            {
                foreach($this->arrDiary as $diary)
                    $diary->diaryInformation();
            }
            else
            {
                foreach($this->arrDiary as $diary)
                {
                    if (!empty($diary->__get($actionName)))
                        $diary->diaryInformation();
                }         
            }               
        }
        
        public function isHungry()
        {
            if (!empty($this->arrDiary))
            {
                $arr = array_filter($this->arrDiary, function($diary)
                                                        {
                                                            if (strcmp($diary->__get("action"), "eat") === 0)
                                                                return $diary;
                                                        });
                if (!empty($arr))
                {
                    if (array_pop($arr)->__get("currentDate") < date('d-m-Y'))
                    return true;
                }               
            }          
            return false;
        }


        public function total($keyName = "eat")
        {
            $total = 0;
            foreach($this->arrDiary as $diary)
            {
                if (strcmp($diary->__get("action"), $keyName) === 0)
                    $total += $diary->__get("amount");
            }
            return $total;
        }


        abstract public function eat();
        abstract public function makeHungrySound();
        abstract public function makeSound();
        abstract public function makeMilk();
        abstract public function beastInformation();
    };

?>
<?php
    class Farm // Nông trại
    {
        private $arrBeast = array();

        public function __construct()
        {
        }

        public function __destruct()
        {
        }



        public function __get($keyName)
        {       
            // if (strcmp($keyName, "arrBeast") === 0)
            //     return $this->arrBeast;       
            if (isset($this->$keyName))                         
                return $this->$keyName;                             
            else
                return null;
        }

        public function __set($keyName, $value)
        {
            if (isset($this->$keyName) && strcmp($keyName, "arrBeast") != 0)               
                $this->$keyName = $value;                         
            else if(array_key_exists($keyName, $this->arrBeast))
                $this->arrBeast[$keyName] = $value;            
            else
                echo "attribute and keyName are not exist<br />";
        }

        public function add($beast)
        {
            $this->arrBeast[] = $beast;
        }

        public function total($keyName = "eat", $id = "")
        {
            $total = 0;
            if (empty($id))
            {
                foreach($this->arrBeast as $beast)
                {
                    $total += $beast->total($keyName);
                }
            }
            else
            {
                foreach($this->arrBeast as $beast)
                {
                    
                    //$myId = $beast->__get("id");               
                    if ($beast->__get("id") === $id)
                        $total += $beast->total($keyName);                   
                }
            }

            return $total;           
        }
    }

?>
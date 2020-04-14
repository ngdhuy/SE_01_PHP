<?php 
    class Post
    {
        private $post_id; 
        private $acc_id;
        private $post_content;
        
        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }
    }
?>
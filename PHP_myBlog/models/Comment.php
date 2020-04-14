<?php 
    class Comment 
    {
        private $comment_id;
        private $comment_content; 
        private $post_id;
        private $acc_id;
        
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
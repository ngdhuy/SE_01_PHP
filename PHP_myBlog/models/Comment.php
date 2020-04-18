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
        
        public function save()
        {
            $db = new Database();
            $sql = "INSERT INTO `comment` (`comment_id`, `comment_content`, `post_id`, `acc_id`, `created_at`, `updated_at`) VALUES (NULL,:cmt_content,:post_id,:acc_id, current_timestamp(), current_timestamp())";

          
            $db->query($sql);
            $db->bind("cmt_content", $this->comment_content);
            $db->bind("post_id", $this->post_id);
            $db->bind("acc_id", $this->acc_id);
               
            $db->execute();
        }
        
    }
?>
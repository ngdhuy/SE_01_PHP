<?php 
    class Post
    {
        private $post_id; 
        private $acc_id;
        private $post_content;

        private $acc_display_name;
        
        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function getAll()
        {
            $db = new Database(); 
            $sql = "SELECT post.post_id, post.acc_id, post.post_content, account.display_name FROM post, account WHERE post.acc_id = account.acc_id";
            $db->query($sql);
            $objects = $db->resultObjects();

            $listOfPost = [];
            foreach($objects as $obj)
            {
                $post = new Post();
                $post->post_id = $obj->post_id;
                $post->acc_id = $obj->acc_id;
                $post->post_content = $obj->post_content;
                $post->acc_display_name = $obj->display_name;

                $listOfPost[] = $post;
            }
            return $listOfPost;
        }
    }
?>
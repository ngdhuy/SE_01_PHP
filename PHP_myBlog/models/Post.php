<?php 
    //include("C:/xampp/htdocs/SE_01_PHP/PHP_myBlog/helper/Database.php");
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

        public function comments(){
            $db = new Database(); 
            
            $sql[] = "SELECT c.*, a.*";
            $sql[] = 'FROM comment as c, account as a';
            $sql[] = 'WHERE c.acc_id = a.acc_id';
            $sql[] = "AND post_id = :post_id";
            $sql[] = "ORDER BY `comment_id`,'DESC' ";
            $sql = implode(" ", $sql);
            $db->query($sql);
            $db->bind("post_id", $this->post_id);
            $objects = $db->resultObjects();

            $list = [];
            foreach($objects as $obj)
            {
                $item = new Comment();
                $item->comment_id = $obj->comment_id;
                $item->comment_content = $obj->comment_content;
                $item->post_id = $obj->post_id;
                $item->acc_id = $obj->acc_id;
                $item->created_at = $obj->created_at;
                $item->account_name = $obj->username;

                $list[] = $item;
            }
           
            return $list;
        }
    }
?>
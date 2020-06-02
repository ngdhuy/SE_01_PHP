<?php 
    class Post
    {
        private $post_id; 
        private $acc_id;
        private $post_content;
        private $created_at;

        private $acc_display_name;

        public $listComment;
        
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
            $sql = "SELECT post.post_id, post.acc_id, post.post_content, account.display_name, post.created_at FROM post, account WHERE post.acc_id = account.acc_id ORDER BY post.created_at DESC";
            $db->query($sql);
            $objects = $db->resultObjects();

            $listOfPost = [];
            foreach($objects as $obj)
            {
                $post = new Post();
                $post->post_id = $obj->post_id;
                $post->acc_id = $obj->acc_id;
                $post->post_content = $obj->post_content;
                $post->created_at = $obj->created_at;
                $post->acc_display_name = $obj->display_name;

                $comment = new Comment();
                $post->listComment = $comment->getAllByPostID($post->post_id);

                $listOfPost[] = $post;
            }
            return $listOfPost;
            unset($db);
        }

        public function Create()
        {
            $db = new Database();
            $sql = "INSERT INTO POST(acc_id, post_content) VALUES(:acc_id, :post_content)";
            $db->query($sql);
            $db->bind("acc_id", $this->acc_id);
            $db->bind("post_content", $this->post_content);
            $db->execute();
            unset($db);
        }
    }
?>
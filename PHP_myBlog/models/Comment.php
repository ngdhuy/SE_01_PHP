<?php 
    class Comment 
    {
        private $comment_id;
        private $comment_content; 
        private $post_id;
        private $acc_id;
        private $created_at;
    
        private $display_name;
        
        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function getAllByPostID($post_id)
        {
            $db = new Database();
            $sql = "SELECT comment.comment_id, comment.comment_content, comment.post_id, comment.acc_id, comment.created_at, account.display_name FROM comment, account WHERE comment.acc_id = account.acc_id AND comment.post_id = :post_id ORDER BY comment.created_at";
            $db->query($sql);
            $db->bind("post_id", $post_id);
            
            $objects = $db->resultObjects();
            $listOfComment = [];
            foreach($objects as $obj)
            {
                $comment = new Comment();
                $comment->comment_id = $obj->comment_id;
                $comment->comment_content = $obj->comment_content;
                $comment->post_id = $obj->post_id;
                $comment->acc_id = $obj->acc_id;
                $comment->created_at = $obj->created_at;
                $comment->display_name = $obj->display_name;

                $listOfComment[] = $comment;
            }
            unset($db);
            return $listOfComment;
        }

        public function Create()
        {
            $db = new Database();
            $sql = "INSERT INTO comment(comment_content, post_id, acc_id) VALUES(:comment_content, :post_id, :acc_id)";
            $db->query($sql);
            $db->bind("comment_content", $this->comment_content);
            $db->bind("post_id", $this->post_id);
            $db->bind("acc_id", $this->acc_id);
            $db->execute();
            unset($db);
        }
    }
?>
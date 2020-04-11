<?php
    class Post extends Database
    {
        private $id;
        private $content;
        private $account_id;
        private $title_post;

        public function __get($attributeName)
        {
            if (isset($this->$attributeName))
                return $this->$attributeName;
            return null;
        }

        public function __set($attributeName, $value)
        {
            if (isset($this->$attributeName))
            {
                $this->$attributeName = $value;
                return true;
            }
            return false;
        }

        public function create($title_post, $content, $account_id)
        {
           //================DB 01 02====================
            $sql = "INSERT INTO post (title_post, content, account_id)
                    VALUES ($title_post, $content, $account_id)";
            return $this->execute($sql);

            //================DB 03====================
            // $params = [$title_post ,$content, $account_id];
            // $sql = "INSERT INTO post (title_post, content, account_id)
            //         VALUES (?, ?, ?)";
            // $this->prepare($sql, "ssi");
            // return $this->execute($params);
        }

        public function delete($id)
        {
            //================DB 01 02====================
            $sql = "DELETE FROM comment  WHERE post_id = $id";
            $this->execute($sql);
            $sql = "DELETE FROM post WHERE id = $id";
            return $this->execute($sql);
        
            //================DB 03====================
            // $params = [$id];
            // $sql = "DELETE FROM comment WHERE post_id = ?";
            // $this->prepare($sql, "i");
            // $this->execute($params);

            // $sql = "DELETE FROM post WHERE id = ?";
            // $this->prepare($sql, "i");
            // return $this->execute($params);
        }

        public function update($id, $title_post= "", $content = "")
        {
             //================DB 01 02====================
             $sql = "   UPDATE post
                        SET content = $content, title_post = $title_post
                        WHERE id = $id ";
             return $this->execute($sql);

             //================DB 03====================
            // $params = [$content, $title_post, $id];
            // $sql = "   UPDATE post
            //             SET content = ?, title_post = ?
            //             WHERE id = ? ";
            // $this->prepare($sql, "ssi");
            // return $this->execute($params);
        }

        public function commentList($id)
        {   
             //================DB 01 02====================
            $sql = "    SELECT id ,content
                        FROM comment
                        WHERE post_id = $id ";
             return $this->execute($sql);

            //================DB 03====================
            // $params = [$id];
            // $sql = "    SELECT id ,content
            //             FROM comment 
            //             WHERE post_id = ? ";
            // $this->prepare($sql, "i");
            // return $this->execute($params);
        }

        public function getPostContent($id)
        {
            //================DB 01 02====================
            $sql = "    SELECT title_post, content
                        FROM post
                        WHERE id = $id ";
             return $this->execute($sql);
        }

    }
?>
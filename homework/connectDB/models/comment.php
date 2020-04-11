<?php
    class Comment extends Database
    {
        private $id;
        private $content;
        private $post_id;

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

        public function create($content, $post_id)
        {
           //================DB 01 02====================
            $sql = "INSERT INTO comment (content, post_id)
                    VALUES ($content, $post_id)";
            return $this->execute($sql);

            //================DB 03====================
            // $params = [$content, $post_id];
            // $sql = "INSERT INTO comment (content, post_id)
            // VALUES (?, ?)";
            // $this->prepare($sql, "si");
            // return $this->execute($params);
        }

        public function delete($id)
        {
            //================DB 01 02====================
            $sql = "DELETE FROM comment WHERE id = $id";
            return $this->execute($sql);

            //================DB 03====================
            // $params = [$id];
            // $sql = "DELETE FROM comment WHERE id = ?";
            // $this->prepare($sql, "i");
            // return $this->execute($params);
        }

        public function update($id, $content)
        {
             //================DB 01 02====================
             $sql = "   UPDATE comment
                        SET content = $content
                        WHERE id = $id ";
             return $this->execute($sql);

             //================DB 03====================
            // $params = [$content, $id];
            // $sql = "   UPDATE comment
            //             SET content = ?
            //             WHERE id = ? ";
            // $this->prepare($sql, "si");
            // return $this->execute($params);
        }
    }

?>
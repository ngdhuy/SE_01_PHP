<?php
    namespace ViewModels;

    use BUS\AccountBUS;
    use BUS\CommentBUS;
    use Models\Post;
    use Models\Account;
    
    class PostViewModel extends Post
    {
        private $display_name;
        private $commentViewModels;

        public function __construct()
        {
            parent::__construct();

            $this->display_name = "";
            $this->commentViewModels = [];
        }

        public function __set($name, $value) {
            if(isset($this->$name))
            {
                $this->$name = $value;

                if ($name == "post_id")
                {
                    $commentBUS = new CommentBUS();
                    
                    $comments = $commentBUS->getByPostID($value);
                    if($comments != null)
                    {
                        foreach($comments as $comment)
                        {
                            $commentViewModel = new CommentViewModel();
                            $commentViewModel->comment_id = $comment->comment_id;
                            $commentViewModel->post_id = $comment->post_id;
                            $commentViewModel->acc_id = $comment->acc_id;
                            $commentViewModel->comment_content = $comment->comment_content;
                            $commentViewModel->created_at = $comment->created_at;
                            $commentViewModel->updated_at =  $comment->updated_at;

                            $this->commentViewModels[] = $commentViewModel;
                        }
                    }
                }
                else 
                {
                    if($name == "acc_id")
                    {
                        $accountBUS = new AccountBUS();
                        $account = $accountBUS->getByID($value);
                        $this->display_name = $account->display_name;
                    }
                }
            }
        }

        public function __get($name)
        {
            return (isset($this->$name)) ? $this->$name : null;
        }
    }
?>
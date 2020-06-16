<?php
    namespace ViewModels;

    use BUS\AccountBUS;
    use BUS\CommentBUS;
    use Models\Comment;
    use Models\Account;
    
    class CommentViewModel extends Comment
    {
        private $display_name;

        public function __construct()
        {
            parent::__construct();

            $this->display_name = "";
        }

        public function __set($name, $value) {
            if(isset($this->$name))
            {
                $this->$name = $value;
                
                if($name == "acc_id")
                {
                    $accountBUS = new AccountBUS();
                    $account = $accountBUS->getByID($value);
                    $this->display_name = $account->display_name;
                }
            }
        }

        public function __get($name)
        {
            return (isset($this->$name)) ? $this->$name : null;
        }
    }
?>
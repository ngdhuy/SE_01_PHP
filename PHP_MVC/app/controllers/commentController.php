<?php
    use Helpers\authentication;
    use BUS\CommentBUS;
    use Models\Comment;
    use Models\Account;

    class commentController extends Controller
    {
        public function exCreate()
        {
            if(authentication::isSignIn() == false)
            {
                $this->redirectToErrorAction(7);
            }

            if(isset($_POST['comment_content']) && isset($_POST['post_id']))
            {
                $postID = $_POST['post_id'];
                $content = $_POST['comment_content'];
                if(strlen($content) != 0) {
                    $account = unserialize($_SESSION['account']);
                    
                    $comment = new Comment();
                    $comment->comment_content = $content;
                    $comment->post_id = $postID;
                    $comment->acc_id = $account->acc_id;
                    
                    $commentBUS = new CommentBUS();
                    $commentBUS->Insert($comment);
                }
        
                $this->redirectToAction("post");
            }
            else
                $this->redirectToErrorAction(5);
        }
    }
?>
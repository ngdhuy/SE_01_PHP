<?php
    use Helpers\authentication;
    use BUS\PostBUS;
    use BUS\AccountBUS;
    use Models\Post;
    use Models\Account;
    use ViewModels\PostViewModel;

    class postController extends Controller
    {
        public function index()
        {
            if(authentication::isSignIn() == false)
            {
                $this->redirectToErrorAction(7);
            }
            
            $postBUS = new PostBUS();
            $listOfPost = $postBUS->getAll();
            
            $listOfPostViewModel = [];
            foreach($listOfPost as $post)
            {
                $postViewModel = new PostViewModel();

                $postViewModel->post_id = $post->post_id;
                $postViewModel->acc_id = $post->acc_id;
                $postViewModel->post_content = $post->post_content;
                $postViewModel->created_at = $post->created_at;
                $postViewModel->updated_at = $post->updated_at;
                
                $listOfPostViewModel[] = $postViewModel;
            }
            
            $d["listOfPostViewModel"] = $listOfPostViewModel;
            $this->set($d);
            $this->render("index");
        }

        public function exCreate()
        {
            if(authentication::isSignIn() == false)
            {
                $this->redirectToErrorAction(7);
            }

            if(isset($_POST["post_content"]))
            {
                $content = $_POST['post_content'];
                if(strlen($content) != 0) {
                    $account = unserialize($_SESSION['account']);
                    
                    $post = new Post();
                    $post->post_content = $content;
                    $post->acc_id = $account->acc_id;
                    
                    $postBUS = new PostBUS();
                    $postBUS->Insert($post);
                }
                $this->redirectToAction("post");
            }
            else
                $this->redirectToErrorAction("5");
        }
    }
?>
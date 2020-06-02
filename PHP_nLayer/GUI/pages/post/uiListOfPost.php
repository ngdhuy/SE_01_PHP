<?php
    use BUS\PostBUS;
    use BUS\AccountBUS;
    use DTO\Post;
    use DTO\Account;

    $postBUS = new PostBUS();
    $listOfPost = $postBUS->getAll();

    include("./GUI/pages/post/uiCreate.php");

    foreach($listOfPost as $post)
    {
        $accountBUS = new AccountBUS();
        $account = $accountBUS->getByID($post->acc_id);
        include("./GUI/pages/Post/templatePost.php");
    }
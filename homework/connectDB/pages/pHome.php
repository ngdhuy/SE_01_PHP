<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 mt-4">
        <?php
            if(isset($_SESSION["account"]))
            {
                $account = unserialize($_SESSION["account"]);
                $postList = $account->postList($account->__get("id"));
                if (!is_bool($postList))
                {
                    foreach($postList as $post)
                    {
                        $post_id = $post["id"];
                        ?>
                            <div class="card mt-2" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $post["title_post"] ?></h5>
                                    <p class="card-text"><?php echo $post["content"] ?></p>
                                    <a href="index.php?post_id=<?php echo $post_id ?>" class="btn btn-primary">Go Post</a>
                                </div>
                            </div> 
                        <?php
                    }    
                }
            }                                                 
        ?>
    </div>
    <div class="col-sm-9 mt-5">
        <?php
            if (isset($_GET["post_id"]))
                $post_id = $_GET["post_id"];
            if (isset($post_id))
            {
                $post = new Post();
                $posting = $post->getPostContent($post_id);
                foreach($posting as $p)
                { 
                    ?>
                        <div class="card mt-2 rounded shadow">
                             <div class="card-body">
                                <h5 class="card-title"> <?php echo $p["title_post"] ?></h5>
                                <p class="card-text"><?php echo $p["content"] ?></p>
                            </div>
                        </div> 
                    <?php
                }

                $commentList = $post->commentList($post_id);
                if (!is_bool($commentList))
                {
                    foreach($commentList as $cmt)
                    {
                ?>
                        <div class="card mt-2 w-75 p-3 float-right">
                            <!-- <div class="card-body"> -->
                                <p class="card-text"><?php echo $cmt["content"] ?></p>
                            <!-- </div> -->
                        </div>
                <?php
                    }
                }
            }
        ?>
    </div>
  </div>
</div>

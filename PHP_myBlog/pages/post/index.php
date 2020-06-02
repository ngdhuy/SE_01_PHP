<div class="jumbotron">
  <h1 class="display-4">List of POST</h1>
  <hr class="my-4">
  <?php include "./pages/post/uiCreatePost.php"; ?>
  <?php 
    $p = new Post();
    $listOfPost = $p->getAll();
    foreach($listOfPost as $post)
    {
      include("./pages/post/uiPost.php");
    }
  ?>

</div>
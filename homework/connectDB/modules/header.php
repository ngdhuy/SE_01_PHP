<?php
    $displayName = "";
    if(isset($_SESSION["account"]))
    {
      $displayName = unserialize($_SESSION["account"])->__get("display_name");    
    }                                                 
?>

<header class="shadow">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">WELCOME <?php echo $displayName ?></h1>
        <p class="lead">Let's join blog</p>
      </div>
    </div>
</header>


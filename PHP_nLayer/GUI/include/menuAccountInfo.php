<ul class="my-2 my-lg-0 navbar-nav">
    <?php 
        if(isset($_SESSION["account"]))
            include("./GUI/include/signIn_info.php");
        else
            include("./GUI/include/signIn.php");
    ?>
</ul>
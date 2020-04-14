<ul class="my-2 my-lg-0 navbar-nav">
    <?php 
        if (isset($_SESSION['account']))
            include "./includes/incLogin/info.php";
        else
            include "./includes/incLogin/nav_login.php";
    ?>
</ul>
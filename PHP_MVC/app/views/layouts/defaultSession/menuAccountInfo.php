<ul class="my-2 my-lg-0 navbar-nav">
    <?php 
        if(isset($_SESSION["account"]))
            require(ROOT."views/layouts/defaultSession/signIn_info.php");
        else
            require(ROOT."views/layouts/defaultSession/signIn.php");
    ?>
</ul>
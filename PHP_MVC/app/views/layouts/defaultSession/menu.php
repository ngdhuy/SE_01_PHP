<ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo Helpers::redirect("home"); ?>"">Home <span class="sr-only">(current)</span></a>
    </li>
    <?php 
        if(isset($_SESSION['account']))
        {
            ?>
                <li class="nav-item active">
                    <a class="nav-link" href="post">Posts</span></a>
                </li>
            <?php
        }
    ?>
</ul>
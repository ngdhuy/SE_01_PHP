<ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <?php 
        if(isset($_SESSION['account']))
        {
            ?>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=5">Post</span></a>
                </li>
            <?php
        }
    ?>
</ul>
<?php 
    $account = unserialize($_SESSION['account']);
?>
<li class='nav-item'>
    <a class="nav-link">Hello, <?php echo $account->display_name; ?></a> 
</li>
<li class='nav-item'>
    <div class="nav-link">|</div>
</li>
<li class='nav-item'>
    <a href="index.php?page=2&action=4" class="nav-link">Log-out</a>
</li>
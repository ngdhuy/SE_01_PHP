<h1>List of Account</h1>
<ul>
    <?php
        foreach($accounts as $acc)
            echo "<li>$acc->display_name</li>";
    ?>
</ul>
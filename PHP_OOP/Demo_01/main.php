<?php
    namespace MyFarm;
    include_once("./Animal.php");
    

    echo Animal::$count;
    
    $a = new Animal();
    echo "<p>$a->name</p>";
    echo "<p>$a->num_leg</p>";
    $a->num_leg = 10;
    echo "<p>$a->num_leg</p>";
    
    $b = new Animal();

    echo Animal::$count."<br />";
    unset($b);
    echo Animal::$count."<br />";
?>
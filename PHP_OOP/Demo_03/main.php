<?php

namespace Farm;

include_once("Animal.php");
include_once("Cow.php");
function main()
{
    $cow = new Cow();
    echo $cow->makeSound();
}
main();
?>
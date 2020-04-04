<?php
    namespace Farm;
    include_once("Cattle.php");
    include_once("Cow.php");
    include_once("Goat.php");
    include_once("Sheep.php");

    function main(){
        $cattles = [
            new Cow(1, "Cow1"),
            new Cow(2, "Cow2", false),
            new Sheep(3, "Sheep1",),
            new Sheep(4, "Sheep2", false),
            new Goat(5, "Goat1"),
            New Goat(6, "Goat2", false)
        ];

        farmHungry($cattles);

        foreach($cattles as $cattle){
            $cattle->getInfo();
            $cattle->eatGrass();
            $cattle->produceMilk();
            $cattle->giveBirth();
        }

        Cow::getStatistic();
        Sheep::getStatistic();
        Goat::getStatistic();
    }

    function farmHungry($cattles){
        echo "===========<br \>Farm are hungry!<br \>------------<br \>";
        foreach($cattles as $cattle){
            $cattle->makeSound();
        }
    }

    main();
?>


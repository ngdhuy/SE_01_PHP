<?php
    namespace Farm;
    include_once("Cattle.php");
    include_once("Cow.php");
    include_once("Goat.php");
    include_once("Sheep.php");
    // include_once("Activity.php");

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

        doAllActivityOne($cattles);

        $cattles[2]->showActivityDiary();

        getStatictic();
    }

    function farmHungry($cattles){
        echo "===========<br \>Farm are hungry!<br \>------------<br \>";
        foreach($cattles as $cattle){
            $cattle->makeSound();
        }
    }

    function doAllActivityOne($cattles){
        foreach($cattles as $cattle){
            $cattle->getInfo();
            $cattle->eatGrass();
            $cattle->produceMilk();
            $cattle->giveBirth();
        }
    }
    function getStatictic(){
        Cow::getStatistic();
        Sheep::getStatistic();
        Goat::getStatistic();

        $count = Cow::$count + Sheep::$count + Goat::$count;
        $grassEatedS = Cow::$grassEatedS + Sheep::$grassEatedS + Goat::$grassEatedS;
        $milkProducedS = Cow::$milkProducedS + Sheep::$milkProducedS + Goat::$milkProducedS;
        $numOfBornS = Cow::$numOfBornS + Sheep::$numOfBornS + Goat::$numOfBornS;

        echo "<strong>=================<br \>";
        echo "Tổng số gia súc: ".$count;
        echo "<br \>Số cỏ gia súc đã ăn: ".$grassEatedS;
        echo "<br \>Tổng số sữa trang trại đã cho: ".$milkProducedS;
        echo "<br \>Tổng số con non: ".$numOfBornS."</strong><br \>";
    }

    main();
?>


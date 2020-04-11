<?php
    //Làm kiểm tra khi động vật kêu đói

    include_once("./Farm.php");
    include_once("./Beast.php");
    include_once("./Cow.php");
    include_once("./Goat.php");
    include_once("./Diary.php");
    include_once("./Sheep.php");
    

    // $diary = new Diary();
    // echo $diary->__get($diary->action);

    // $cow = new Cow();
    // echo $cow->eat();
    // echo $cow->makeMilk();
    // echo $cow->eat();

    // $goat = new Goat(1, "female");
    // echo $goat->born();
    // echo $goat->eat();

    // $farm = new Farm();
    // $farm->addBeast($cow);
    // $farm->addBeast($goat);
    // foreach ($farm->__get("arrBeast") as $f)
    // {
    //     $f->diaryInformation();
    //     $f->beastInformation();
    //     // $f->makeHungrySound();
    // }
    // echo $farm->total();
    



    ////////////////////////////////////////////////////
    $beast = [ new Cow(),
                new Goat(1, "female"), 
                new Sheep(4, "female"),
            1];
    $farm = new Farm();
    $farm->addBeast($beast);
    foreach ($farm->__get("arrBeast") as $f)
    {
        $f->diaryInformation();
        $f->beastInformation();
        // $f->makeHungrySound();
    }
    echo $farm->total();    
?>
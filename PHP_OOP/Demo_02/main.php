<?php 
    namespace Farm;
    include_once("Animal.php");
    include_once("Dog.php");

    function main()
    {
        // $a = new Animal();

        // $a->id = 1; 
        // $a->name = "No-name";
        // $a->num_of_leg = -4;

        // $a->color = "red";
        
        // echo "<p>$a->id - $a->name - $a->num_of_leg</p>";
        // var_dump($a);
        // echo "<hr />";
        // var_dump(isset($a->name));
        // unset($a->name);
        // echo "<br />";
        // var_dump($a);
        
        echo "<hr />";
        echo "<h1>Dog</h1>";
        $dog = new Dog(1, "Corgi", 4, "white");
        print_r($dog);
        $dog->type = "Dog";
        echo "<br />";
        print_r($dog);
        $dog->makeSound();
    }

    main();

?>
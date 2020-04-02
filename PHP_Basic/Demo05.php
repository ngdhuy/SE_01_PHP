<?php
    $a = array(1, 2, 3, 4, 5); // PHP 5.0
    var_dump($a);
    echo "<br />";
    $b = [1, 2, 3, 4, 5];       // Version PHP > 7.0
    var_dump($b);
    
    echo "<hr />";
    echo "<div>For statement</div>";
    for($i = 0; $i < count($a); $i++) {
        echo $a[$i];
    }
    echo "<div>Foreach statement</div>";
    foreach($a as $i) {
        echo $i;
    }

    echo "<hr />";
    $c = ["one" => "Số một", "two" => "Số hai", "three" => "Số ba"];
    echo $c["two"]."-->".$c[0];

    foreach($c as $key=>$value) {
        echo "<p>$key = $value</p>";
    }

    echo "<hr />";
    echo "<h1>Insert new item to array</h1>";
    $a[] = 6;
    var_dump($a); echo "<br />";
    array_push($a, 7, 8, 9);
    var_dump($a); echo "<br />";

    echo "<hr />";
    array_splice($a,3,1);
    var_dump($a); echo "<br />";
    
    unset($a[1]);
    var_dump($a); echo "<br />";

    echo "<hr />";
    var_dump($c);
    extract($c);                // Extract Key to variable
    echo "<p>$one</p>";
    echo "<p>$two</p>";
    echo "<p>$three</p>";

    echo "<hr />";
    $d = compact('one', 'two', 'three');
    var_dump($d);

    echo "<hr />";
    echo "<h1>Stack function</h1>";
    $e = [0, 1, 2, 3, 4];
    array_push($e, 5);
    var_dump($e); echo "<br />";
    $f = array_pop($e);
    var_dump($f); echo "<br />";
    var_dump($e); echo "<br />";

    echo "<hr />";
    echo "<h1>Queue function</h1>";
    $g = [0, 1, 2, 3, 4, 5];
    var_dump($g); echo "<br />";
    $h = array_shift($g);
    var_dump($h); echo "<br />";
    var_dump($g); echo "<br />";
    array_push($g, 8);
    var_dump($g); echo "<br />";
    array_unshift($g, 99);
    var_dump($g); echo "<br />";

    echo "<hr />";
    echo "<h1>Merge and Slice</h1>";
    $i = [1, 2, 3];
    $j = ["one", "two"];

    $k = array_merge($i, $j);
    echo "Merge:"; var_dump($k); echo "<br />";

    $l = array_slice($k, 2, 3);
    echo "Slice: "; var_dump($l); echo "<br />";

    echo "<hr />";
    echo "<h1>Question</h1>";
    $m = [0, 1, 2, 3, 4, 5, 6, 7, 8];
    print_r($m); echo "<br />";
    array_splice($m, 4, 0, 99);
    echo "Insert new item 99: "; print_r($m); echo "<br />";
    array_splice($m, 6, 1);
    echo "Remove new item 99: "; print_r($m); echo "<br />";

    echo "<hr />";
    echo "<h1>String to array</h1>";
    $n = "This is the test";
    $o = explode(" ", $n);
    var_dump($o); echo "<br />";
    $p = implode("_", $o);
    var_dump($p); echo "<br />";

    echo "<hr />";
    echo "<h1>Searching</h1>";
    $color = ['red', 'green', 'blue', 'yellow', 'black', 'white', 'orange'];
    $position = array_search('yellow', $color);
    echo "<p>Color position: $position</p>";
    $position = array_search('pure', $color);
    echo "<p>Color position: $position</p>";
    var_dump($position); echo "<br />";
    
    $flag = in_array("oran", $color);
    var_dump($flag); echo "<br />";

    print_r($color); echo "<br />";
    $color[] = 'yellow';
    $color[] = 'orange';
    $color[] = 'yellow';
    print_r($color); echo "<br />";
    $color_2 = array_unique($color);
    print_r($color_2); echo "<br />";

    function checkYellow($color) {
        return $color == "yellow";
    }

    $color_4 = array_filter($color, 'checkYellow');
    print_r($color_4); echo "<br />";

    echo "<hr />";
    function toString($n) {
        return "color $n";
    }
    $color_3 = array_map('toString', $color);
    print_r($color_3); echo "<br />";

    echo "<hr />";
    $arrNum = [1, 2, 3, 4, 5, 6, 7, 8];

    function sum($sum_value, $number) {
        $sum_value += ($number % 2 == 0) ? $number : 0;
        return $sum_value;
    }

    $result = array_reduce($arrNum, 'sum');
    var_dump($result);
?>
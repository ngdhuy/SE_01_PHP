<?php 
    $i = 1; // untype varibale
    echo "<div>i = $i</div><div>Type of i = ".gettype($i)."</div>";
    $i = "Hello world";
    echo "<div>i = $i</div><div>Type of i = ".gettype($i)."</div>";
    echo "<hr />";

    var_dump(1 == 1.0); echo "<br />";
    var_dump(1 === 1.0); echo "<br />";
    var_dump(1 == "1"); echo "<br />";
    var_dump(1 === "1"); echo "<br />";

    echo "<hr />";
    var_dump(is_numeric($i)); // Kiểm tra giá trị của $i có phải là số không
    echo "<br />";
    // var_dump(is_nan($i)); // Kiểm tra giá trị của $i hông phải là số phải không
    is_string($i);

    echo "<hr />";
    $a = "abc";
    $$a = "1";

    echo "<div>a = $a</div>";
    echo "<div>dorla_a = ".$$a."</div>";
    echo "<div>dorla_abc = $abc</div>";

    # Define constants
    define("URL", "http://www.fit.hcmus.edu.vn");
    echo (URL);
?>
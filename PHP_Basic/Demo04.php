<?php
    $a = "Hello";
    $b = "world"; 
    echo "<h1>$a $b</h1>";
    echo $a." ".$b;
    echo '<h1>$a $b</h1>';
    echo "<hr />";

    $c = $a." ".$b;
    echo "<h3>$c</h3>";
    var_dump(strlen($c));
    var_dump(str_word_count($c));
    var_dump(substr($c,2, 3));
    var_dump(strrev($c));
    var_dump(str_replace("l","m",$c));
    echo "<hr />";
    
    $pw = "admin";
    echo "<div>pw = $pw</div>";
    $e_pw = password_hash($pw, PASSWORD_DEFAULT);
    echo "<div>e_pw = $e_pw</div>";
    $d_pw = "admin";
    $ed_pw = password_hash($d_pw, PASSWORD_DEFAULT);
    echo "<div>ed_pw = $ed_pw</div>";
    var_dump(password_verify($d_pw, $e_pw));
    echo "<hr />";
    $e = "admin";
    var_dump(md5($e));
    echo "<hr />";
    var_dump(md5("admin"));
    echo "<hr />";
    var_dump(sha1($e));
?>
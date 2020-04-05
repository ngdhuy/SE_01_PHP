<?php 
    var_dump($i);echo "<br />";
    var_dump(isset($i)); echo "<br />";
    var_dump(empty($i)); echo "<br />";
    $i = 1;
    var_dump($i);  echo "<br />";
    var_dump(isset($i)); echo "<br />";
    var_dump(empty($i)); echo "<br />";
    echo "<hr />";
    // $i = null;
    var_dump(empty($i)); echo "<br />"; 
    var_dump($i);  echo "<br />";
    var_dump(isset($i)); echo "<br />";
    unset($i);  // Xóa vùng nhớ biến $i
    var_dump($i); echo "<br />";
    var_dump(empty($i)); echo "<br />";
    var_dump(isset($i)); echo "<br />";
    echo "<hr />";
?>
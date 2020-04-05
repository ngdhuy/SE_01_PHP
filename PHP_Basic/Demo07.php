<?php
    function sum($a, $b) {
        $a = $a + 2;
        $result = $a + $b;
        return $result;
    }

    function _double(&$a) {
        $a = $a * 2;
        return $a;
    }

    function sum_2($a, $b) {
        global $sum;
        $sum = $sum + $a + $b;
    }

    function sume_3($a = 5) {
        return $a;
    }

    function main() {
        $a = 4;
        $b = 5;

        echo "<p>a = $a</p><p>b = $b</p>";
        $c = sum($a, $b);
        echo "<p>a = $a</p><p>b = $b</p><p>c = $c</p>";
        
        $d = _double($b);
        echo "<p>b = $b</p><p>d = $d</p>";
        
        global $sum;
        sum_2($a, $b);
        echo "<h2>$sum</h2>";

        function multi($a, $b) {
            return $a * $b;
        }

        $f = 'multi';
        echo $f(6, 3);

        echo "<h3>Default parameter</h3>";
        echo sume_3()."<br />".sume_3(9);

        echo "<h3>Anomymous function</h3>";
        $s = function($str) {
            return strtoupper($str);
        };

        echo $s("Hello everybody!!!");
        
    }

    $sum = 8;
    main();
?>
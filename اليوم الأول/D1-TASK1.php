<?php

/*
Write a PHP program to calculate electricity bill .
Conditions:
For first 50 units – 3.50/unit
For next 100 units – 4.00/unit
For units above 150 – 6.50/unit
*/

$usage = 151;

if($usage <= 50){
    $x = $usage * 3.50;
    echo "your total bill is ".$x;
} elseif($usage > 50 && $usage <= 150){
    $a = 50*3.5;
    $b = ($usage - 50) * 4.00;
    echo "your total bill is ==> ". $a + $b;
}elseif($usage > 150){
    $w = 50*3.5;
    $s = 100*4.00;
    $d = ($usage - 150) * 6.50;
    echo "your total bill is >>> ".$w + $s + $d;
};

?>
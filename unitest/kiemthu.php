<?php

function sum($a,$b){
    $total = $a + $b;
    return $total;
}
$output = sum(100,1000);
$expected_output = 1100;
if($expected_output == $output){
    echo "pass";
}else{
    echo "fail";
}
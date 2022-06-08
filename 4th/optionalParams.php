<?php

function addV1 ($number1, $number2 = 0, $number3 = 0){
    return $number1 + $number2 + $number3;
}


// echo addV1(1,3,6);

function printFullName($lastName,$firstName = '*',$middleName = '*'){
    echo "{$firstName} {$middleName} {$lastName} <br>";
}

// printFullName("galal","abdelwahed",'husseny');






#Named Arguments
printFullName(middleName:"abdelwahed",lastName:'husseny');
// * Abelwahed Husseny
printFullName(firstName:"galal",lastName:'husseny');
// galal * Husseny
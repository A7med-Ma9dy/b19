<?php

// $number = 10; // global var

// function incrementNumber(int $number){
//     // local parameter
//     echo ++$number.'<br>';
// }

// incrementNumber(2);

// echo $number;

#############################################


// $number = 10; // global var

// # pass by value
// function incrementNumber(int $number){
//     // local parameter
//     echo ++$number.'<br>';
// }

// incrementNumber($number);

// echo $number;


// $number1 = 10;
// $number2 = 20;
// $sum = 0;

// function addNumbers($number1 , $number2){
//     $sum =  $number1 + $number2;
//     return $sum;
// }


// echo addNumbers($number1,$number2);

// echo $sum;

#####################################


// $number = 10;
// $number2 = 20;
# pass by reference
// function incrementNumberByReference(int &$number) {
//     return ++$number.'<br>';
// }

// echo incrementNumberByReference($number2); //21

// echo $number .'<br>'; // 10

// echo $number2; // 21

function data (){
    $data = 123;
    return $data;
}

echo data(); 
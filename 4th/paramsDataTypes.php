<?php
// declare(strict_types=1);
function sumNumbers (int $number1,float $number2,float $number3 ) :float {
    return $number1 + $number2 + $number3;
}

echo sumNumbers(1.5,2,3);




// function sumNumbers (int $number1,float $number2,float $number3 ) :int {
//     return $number1 + $number2 + $number3;
// }

// echo sumNumbers(1.5,2.5,3.5);



// function sumNumbers (array $number1,float $number2,float $number3 ) :void {

// }

// echo sumNumbers([],2.5,3.5);


// function sumNumbers (?array $number1,string $number2,int|float $number3 ) :void {

// }

// sumNumbers(null,'',5.5);
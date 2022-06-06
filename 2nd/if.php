<?php
// $message = "<h1>";
// $message .= "Toqa";
// $message .= "</h1>";
// echo $message;

// if(TRUE||FALSE){

// }
// $number1 = 0;
// $number2 = 10;
// if($number1 < $number2){
//     // echo "ok";
// }
// $name = "0";
// $sports = null;
// restricted values => 0, "" , "0" , [] , false , null
// if($sports){
//     echo "ok";
// }

// $code = 123456;

// if($code) {
//     echo "User Has Code";
// }else{
//     echo "User Hasn't Code";
// }


// $order = "P";
// $order = "C";
// $order = "O";
// $order = "D";
// $order = "R";

// if($order == 'P'){
//     $status = "Pending";
// }elseif($order == "C"){
//     $status = "Confirmed";
// }elseif($order == "O"){
//     $status = "On it's way";
// }elseif($order == "D"){
//     $status = "Deliverd";
// }else{
//     $status = "Reviewed";
// }

// echo $status;
$array = [0];
// $message = "";
if($array){
    $message = "hello";
}

if(isset($message)){
    // echo $message;
}


$number1 = 25;
$number2 = 10;
$number3 = 20;

var_dump( 
    !( 
        ($number1 <= $number3 || $number2 >= $number1) 
        && 
        ($number1 <= $number3 && $number2 !== $number1)
    )
);


#AND &&
// i/p i/p o/p
//  1  1    1

#OR ||
// 1  0    1
// 0  1    1
// 1  1    1

#NOT !
//    1        0
//    0        1
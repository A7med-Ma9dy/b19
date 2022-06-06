<?php
// switch ($variable) {
//     case 'value':
//         # code...
//         break;
//      case 'value':
//         # code...
//         break;
//     default:
//         # code...
//         break;
// }

// $color = 'brown';

// switch ($color) {
//     case 'black':
//     case 'blue':
//         echo "i like {$color} <br>";
//         break;    
//     case 'yellow':
//     case 'red':
//         echo "i don't like {$color} <br>";
//         break; 
//     default:
//         echo "i don't know this color <br>";
// }

// switch ($color) {
//     case $color == 'black' || $color == 'blue':
//         echo "i like {$color} <br>";
//         break;    
//     case $color == 'red' || $color == 'yellow':
//         echo "i don't like {$color} <br>";
//         break; 
//     default:
//         echo "i don't know this color <br>";
// }
$studentGrade = 1;
define('MAX_GRADE',100);

// if($studentGrade < 0 || $studentGrade > 100){
//     $message = "Please Enter Valid Grade";
// }elseif($studentGrade >= (MAX_GRADE/2)){
//     $message = "success";
// }else{
//     $message = "failed";
// }

// if($studentGrade <= 100 && $studentGrade >= 0){
//     if($studentGrade >= (MAX_GRADE/2)){
//         $message = "success";
//     }else{
//         $message = "failed";
//     }
// }else{
//     $message = "Please Enter Valid Grade";
// }

// switch($studentGrade){
//     case $studentGrade < 0:
//     case $studentGrade > 100:
//         $message = "Please Enter Valid Grade";
//         break;
//     case $studentGrade >= (MAX_GRADE/2):
//         $message = "success";
//         break;
//     default:
//         $message = "failed";
// }

// echo $message;

// $person = 'f';
// $gender = ($person == 'f') ? "female" : "male";

// $code = NULL;
// echo $code ?? "user hasn't code";
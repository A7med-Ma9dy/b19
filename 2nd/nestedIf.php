<?php
$person = 'f';
$salary = 1500;

#app 
//  salary > 1000 => rich
//  person = f => female
//  person = m => male
// o/p female , poor

$message = "";
if($person == 'm'){
    $message .= "male";
}else{
    $message .= "female";
}

if($salary > 1000){
    $message .= " , rich";
}else{
    $message .= " , poor";
}

echo $message;



// if($salary > 1000){
//     if($person == 'f'){
//         echo "female , rich";
//     }else{
//         echo "male , rich";
//     }
// }else{
//     if($person == 'f'){
//         echo "female , poor";
//     }else{
//         echo "male , poor";
//     }
// }

// if($salary > 1000 && $person == 'f'){
//     echo "female , rich";
// }elseif($salary > 1000 && $person == 'm'){
//     echo "male , rich";
// }elseif($salary <= 1000 && $person == 'f'){
//     echo "female , poor";
// }else{
//     echo "male , poor";
// }


<?php
# continue => igonre current iteration
# break => ignore current loop
$users = ['asmaa','ahmed','beshoy','fatma','mariam','ayat','toqa','ahmed']; // 7 elements

// for ($i=0; $i < 10; $i++) { 
//     if($i == 5){
//         break;
//     }
//     echo "{$i} <br>";
// }

// foreach ($users as $value) {
//     if($value == 'fatma'){
//         continue;
//     }
//     echo $value . '<br>';
// }
$search = 'mariam';
$found = false;
foreach($users AS $value){
    if($value == 'mariam'){
        $found = true;
        break;
    }
}

if($found){
    echo "founded";
}else{
    echo "not found";
}


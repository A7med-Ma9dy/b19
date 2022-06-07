<?php
$users = ['asmaa','ahmed','beshoy','mariam','ayat','toqa','ahmed']; // 7 elements
$lastIndex = count($users) -1;
// echo $users[0];
// echo $users[1];
// echo $users[2];
// echo $users[3];
// echo $users[4];
# for
// for (start;end;step) { 
//     # code...
// }
// for($counter = 1;$counter < 6;$counter++){
//     // echo $counter.'<br>';
//     echo "welcome <br>";
// }
// for($counter = 5;$counter >= 1;$counter--){
    // echo $counter.'<br>';
// }

// for($i = 0;$i <= $lastIndex;$i++){
    // echo $users[$i].'<br>';
// }
// for ($i=$lastIndex; $i >= 0 ; $i--) { 
//     echo $users[$i].'<br>';
// }


# while
// intial counter 
// while (condition) {
//     # code...
//     step
// }
// $counter = 0;
// while ($counter <= $lastIndex) {
//     # code...
//     echo $users[$counter].'<br>';
//     $counter++;
// }

#do while

// intial counter 
// do{
    # code
    // step 
// }while(condition);
// $counter = $lastIndex;
// do{
//     echo $users[$counter].'<br>';
//     $counter--;
// }while($counter >= 0);

// for($counter = 5;false;$counter--){
//     echo 'welcome';
// }

// $counter = 0;
// while (false) {
//     # code...
//     echo 'welcome';
//     $counter++;
// }

// $counter = $lastIndex;
// do{
//     echo 'welcome';
//     $counter--;
// }while(false);

#foreach
$product = [
    'name'=>'mobile',
    'quantity'=>5,
    'price'=>5000,
];

// foreach(array|object AS $var1=>$var2){
// 
// }
// foreach($product AS $key=>$value){
//     echo "{$key} ===>>> {$value} <br>";
// }
<?php
# object => elements (property,value) , property => unique
$user = (object)[
    'id'=>5,
    'name'=>'mariam',
    'email'=>'mariam@gmail.com',
    'password'=>123456
];

// var_dump($user);
// echo $user->email; // get value
$user->phone = '1231563213'; // set value
$user->name = 'beshoy';
print_r($user);
?>


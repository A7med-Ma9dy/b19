<?php

# indexed array => elements(index,value) , index=> unique numeric key 
// $array = ['ahmed',1,null,5.5,false,[]];
$users = ['asmaa','ahmed','beshoy','mariam','ayat','toqa','ahmed']; // 6 elements
$lastIndex = count($users) - 1;
// print_r($users);
// echo $users[2]; // get
$users[0] = 'galal'; // edit
$users[7] = 'arwa';
$users[8] = 'menna';
$users[count($users)] = 'mohamed';
$users[count($users)] = 'shymaa';
// print_r($users);

# associative array => elements(key,value) , key=> unique string key

$product = [
    'name'=>'mobile',
    'quantity'=>5,
    'price'=>5000,
    
    // 'name'=>'tshirt'
];
// print_r($product);die;
// echo $product['quantity']; // get 
$product['name'] = 'laptop';
$product['desc'] = 'details';
// print_r($product);

// $_POST['number']; // array 
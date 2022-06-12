<?php

// class => blueprint which group similar tasts => orgainze application structure
// access modifiers [public - protected - private]
// class className {
    // access modifier // property => variable 
    // access modifier // method => function
    // access modifier // constant
// }

// object => instance to access class scope(local scope) into global scope

# class user
// function login 
// function register
// function profile
// function logout

# class order
// function makeOrder
// function cancelOder
// function reviewOrder

# class product
// function getAllProducts
// function getRecentProducts

class user {
    public $id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $gender = 'm';

    public function login () {
        echo "login<br>";
    }
    public function logout () {
        echo "logout<br>";
    }
    public function profile () {
        echo "profile<br>";
    }
    public function register () {
        echo "register<br>";
    }
}

$user = new user;
// echo $user->gender;
$user->id = 1;
$user->name = 'shrok';
$user->email = 'shrok@gmail.com';
$user->password = 123456;
$user->gender = 'f';
$user->phone = '123456789';
$user->age = 26;
// print_r($user);
// $user->login();
$user->register();

$user2 = new user;
$user2->id = 2;
$user2->name = 'asmaa';
$user2->email = 'asmaa@gmail.com';
$user2->password = 123456;
$user2->gender = 'f';
$user2->phone = '564132132';
$user2->login();
// print_r($user2);

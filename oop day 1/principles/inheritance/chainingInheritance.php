<?php

class person {
    public $id;
    public $name;

    public function login()
    {
        # code...
    }
    public function logout()
    {
        # code...
    }
}


class user  extends person {
    public $email;
    public $password;
}


class admin extends user {
    public $phone;
}

// class seller extends admin {
//     public $nationalId;
//     // public const x = 5;
// }

// print_r(new person);
// print_r(new user);
// print_r(new admin);
// print_r(new seller);
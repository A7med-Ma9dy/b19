<?php

abstract class person {
    public const status = 1;
    public static $id;
    public $name;
    public $email;
    public $password;
    public $gender;
    protected abstract function login();
    public function logout()
    {
        echo "logout <br>";
    }
    public  function profile()
    {
        
    }
}


class client extends person {
    public function login()
    {
        echo "email & password<br>";
    }
}

class seller extends person {
    public function login()
    {
        echo "phone & password<br>";
    }
}
$client = new client;
$client->login();
$seller = new seller;
$seller->login();



class admin  extends person {
    public function login()
    {
        echo "username & password<br>";
    }
}
<?php

 class person {
    public $id;
    public $name;
    public $password;
    public $email;
    public const personType = 'client';

    public  function login()
    {
        echo "Login (email & password) <br>";
    }
    public function logout()
    {
        echo "logout <br>";
    }
}


class client extends person {

}

$client = new client;
// $client->login();

class seller extends person {
    public $phone;
    public $nationalId;
    public $prodcutType;
    public const personType = 'seller';
    #prevent override
    public function login()
    {
        echo "Login (phone & password) <br>";
    }

    public function getType()
    {
        echo self::personType;
    }
    public function getParentType()
    {
        echo parent::personType;
    }
}

$seller = new seller;
$seller->login();
// $seller->getType();



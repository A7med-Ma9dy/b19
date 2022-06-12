<?php
class user {
    public static $name = 'galal';
    public const bonus = 50;
    public static function referToClass()
    {
        return  "refer to class <br>";
    }
    public $id;
    public function referToObject()
    {
        return "refer to object <br>";
    }
    public function print()
    {
        echo $this->id .'<br>';
        echo $this->referToObject();

        ###########################
        echo user::bonus  .'<br>';
        echo user::$name  .'<br>';
        echo user::referToClass();
        ################ refer to class using self keyword  ############################
        echo self::bonus  .'<br>';
        echo self::$name  .'<br>';
        echo self::referToClass()  ;
        ################ refer to class using static keyword  ############################
        echo static::bonus  .'<br>';
        echo static::$name  .'<br>';
        echo static::referToClass() ;

        // what is difference between self & static keywords in php ? 
    }
}

// echo user::bonus .'<br>'; // :: scope resolution operator 
// echo user::$name  .'<br>'; // :: scope resolution operator 
// echo user::referToClass();
// $user = new user;
// $user->name = 'galal';
// echo $user->bonus;

$user = new user;
$user->id = 4;
// echo $user->id;
// echo $user->referToObject();
// print_r($user);
$user->print();



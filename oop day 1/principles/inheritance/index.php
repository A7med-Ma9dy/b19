<?php
# parent class - super class
# child class - sub class
# inheritance => reduce code duplication
# php single inheritance
class ipad {
    public $pen;
}
class mobile {
    public $name;
    public $color;
    public $brand;
    public $ram;
    public $price;
    public $storage;
    // public $cameraPx;
    public $charger = true;
    public static $madeIn = 'china';
    public const version = '1.0';
}

class samsung extends mobile {
    public $screenFingerPrint = true;
}

class apple extends mobile {
    public $faceId = true;
    public $charger = false;
}

// echo samsung::$madeIn;
// $samsung = new samsung;
// print_r($samsung);


// $apple = new apple;
// print_r($apple);
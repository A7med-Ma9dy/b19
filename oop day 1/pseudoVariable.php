<?php

class mobile {
    public $brand;
    public $color;

    public function getBrand()
    {
        return $this->brand;
    }
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }
    public function specs()
    {
        return $this;
    }
    public function turnOn()
    {
        return " Welcome From {$this->brand} <br> "; // pseudo variable => refer to current object
    }
    public function printMessage()
    {
        echo $this->turnOn();
    }
}



$samsung = new mobile;
$samsung->setBrand('Galaxy');
$samsung->printMessage();

$apple = new mobile;
$apple->setBrand('Iphone');
$apple->printMessage();



// $samsung = new mobile;
// $samsung->brand = 'samsung';
// $samsung->color = 'blue';
// $samsung->setBrand('Samsung');
// print_r($samsung->getBrand());

// $apple = new mobile;
// $apple->brand = 'apple';
// $apple->color = 'black';
// $apple->setBrand('Iphone');
// print_r($apple->getBrand());

// print_r($samsung->getBrand());
// print_r($apple->getBrand());


// print_r($samsung->specs());
// print_r($apple->specs());
// $samsung->turnOn();
// $apple->turnOn();

// (new mobile)->turnOn();
// $oppo = new mobile;
// $oppo->turnOn();
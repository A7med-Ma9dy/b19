<?php

class contract {
    public $name;
    public $position;
    public $positionType;
    public $startDate;
    public $endData;
    public $salary;
    public $contractDate = '12/6/2022';
    public $ensurance = true;
}

$firstEmployeeContract = new contract;
$firstEmployeeContract->name = "shymaa";
$firstEmployeeContract->salary = 7000;
$firstEmployeeContract->position = 'backend';
$firstEmployeeContract->positionType = 'fulltime';
$firstEmployeeContract->startDate = '1/7/2022';
$firstEmployeeContract->endData = '1/7/2023';


$secondEmployeeContract = new contract;
$secondEmployeeContract->name = 'khloud';
$secondEmployeeContract->salary = 5000;
$secondEmployeeContract->position = 'frontend';
$secondEmployeeContract->positionType = 'parttime';
$secondEmployeeContract->startDate = '1/7/2022';
$secondEmployeeContract->endData = '1/12/2022';
$secondEmployeeContract->hourPrice = 100;
$secondEmployeeContract->ensurance = false;

print_r($firstEmployeeContract);
print_r($secondEmployeeContract);
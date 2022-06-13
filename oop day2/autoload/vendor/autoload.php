<?php
spl_autoload_register(function($class){
    include "classes/{$class}.php";
});

spl_autoload_register(function($class){
    include "classes/app/{$class}.php";
});
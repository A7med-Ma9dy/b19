<?php
// what is difference between absolute path & relative path ? 
class test {
    public static function print()
    {
        echo __CLASS__;
        echo "<br>";
    }
}

// test::print();

class test2 {
    public static function print2()
    {
        echo test2::class;
        echo "<br>";
    }
}

// test2::print2();


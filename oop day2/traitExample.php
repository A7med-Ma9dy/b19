<?php

class person1 {
    public $id;
    public $name;
    public function uploadPhoto(){
        echo "upload photo from person1 class <br>";
    }
}

trait media {
    public function uploadPhoto(){
        echo "upload photo from media trait <br>";
    }
}

class user extends person1 {
    use media;
    // public function uploadPhoto(){
    //     echo "upload photo from user class <br>";
    // }
}

(new user)->uploadPhoto(); // upload photo from media trait
<?php
trait mediav2 {
    public function uploadPhoto()
    {
        echo "upload photo from mediav2 <br>";
    }
}

trait mediav1 {
    public function uploadPhoto()
    {
        echo "upload photo from mediav1 <br>";
    }
}




class user {
    use mediav1,mediav2 {
        mediav1::uploadPhoto AS uploadPhotoMediav1;
        mediav2::uploadPhoto insteadof mediav1;
    }
}

(new user)->uploadPhotoMediav1();
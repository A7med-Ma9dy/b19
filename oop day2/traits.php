<?php

// class media {
//     public static function uploadPhoto()
//     {
//         echo "upload photo <br>";
//     }
// }

// class user  {
//     public function profile()
//     {
//         media::uploadPhoto();
//     }
// }


// class product {
//     public function create()
//     {
//         media::uploadPhoto();
//     }
// }
##################################################
trait media {
    public function uploadPhoto()
    {
        echo "upload photo <br>";
    }
    public function uploadExcel()
    {
        echo "upload photo <br>";
    }
}
trait data {
    public  $x = 5;
    public function import()
    {
        echo "import<br>";
    }
    public function export()
    {
        echo "export<br>";
    }
}

trait generalTrait {
    use media,data;
}


class product {
    use generalTrait;
}
class user  {
    use generalTrait;
}
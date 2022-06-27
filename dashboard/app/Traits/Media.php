<?php
namespace App\Traits;
trait Media {
    public function upload($image,$dir)
    {
        $photoName = $image->hashName(); // asdfgdf3sfdf2sdf3.png
        $image->move(public_path("images\\{$dir}"),$photoName);
        return $photoName;
    }
    public function delete($path)
    {
        if(file_exists($path)){
            unlink($path);
            return true;
        }
        return false;
    }
}

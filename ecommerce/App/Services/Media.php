<?php
namespace App\Services;

class Media {
    private array $file;
    private array $errors = [];
    private string $fileName;
    private string $fileType = '';
    private string $fileExtension  = '';
    public string $newFileName;
    public string $newFilePath;
    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * Get the value of errors
     */ 
    public function getError(string $key) :?string
    {
        if(isset($this->errors[$this->fileType][$key])){
            return self::template($this->errors[$this->fileType][$key]);
        }
        return null;
    }

    private static function template($value)
    {
        return "<p class='text-danger font-weight-bold'>{$value}</p>";
    }

    public function setFile(array $file) {
        $this->file = $file;
        $typeArray = explode('/',$file['type']);  // image/png
        $this->setFileType($typeArray[0]) ; //image
        $this->setFileExtension($typeArray[1]); //png
        return $this;
    }

    public function size(int $maxSize) :self
    {
        if($this->file['size'] > $maxSize){
            $this->errors[$this->fileType][__FUNCTION__] = "Maximum Size Must Be Less Than {$maxSize} Bytes";
        }
        return $this;
    }
    public function extension(array $availableExtensions) :self
    {
        if(!in_array($this->fileExtension,$availableExtensions)){
            $this->errors[$this->fileType][__FUNCTION__] = "Available Extensions Are " .implode(' , ',$availableExtensions) ;
        }
        return $this;
    }

    public function upload(string $pathTo) :bool // assets/img/users/
    {
        
        $this->newFileName = uniqid() . '.' . $this->fileExtension; // a2d3a1fdds32fsd.png
        $this->newFilePath = $pathTo . $this->newFileName;  // assets/img/users/a2d3a1fdds32fsd.png
        return move_uploaded_file($this->file['tmp_name'],$this->newFilePath);
    }

    public static function delete(string $path) :bool
    {
        if(file_exists($path)){
            unlink($path);
            return true;
        }
        return false;
    }

    /**
     * Set the value of fileType
     *
     * @return  self
     */ 
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;

        return $this;
    }

    /**
     * Set the value of fileExtension
     *
     * @return  self
     */ 
    public function setFileExtension($fileExtension)
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }
}
<?php
namespace App\Http\Requests;

class Validation {
    private array $errors = [];
    private $valueName; // first_name
    private $value; // Galal

    public function required()
    {
        if(empty($this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Is Required";
        }
        return $this;
    }
    public function confirmed($comparedValue)
    {
        if($this->value != $comparedValue){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Not Confirmed";
        }
        return $this;
    }
    public function max(int $max)
    {
        if(strlen($this->value) > $max){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must Be Less Than {$max} Characters";
        }
    }

    public function regex(string $pattern)
    {
        if(!preg_match($pattern,$this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Invalid";
        }
        return $this;
    }

    public function in(array $values)
    {
        if(!in_array($this->value,$values)){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must Be In ".implode(" , ",$values);
        }
        return $this;
    }

    public function unique(string $table,string $column)
    {
        # code...
    }

    public function exists(string $table,string $column)
    {
        # code...
    }

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
    public function getError(string $error)
    {
        if(isset($this->errors[$error])){
            foreach($this->errors[$error] AS $error){
                return "<p class='text-danger font-weight-bold'>* {$error}</p>";
            }
        }
        return null;
    }

    /**
     * Set the value of valueName
     *
     * @return  self
     */ 
    public function setValueName($valueName)
    {
        $this->valueName = $valueName;

        return $this;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}


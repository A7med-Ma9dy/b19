<?php
namespace App\Http\Requests;

use App\Database\Models\Model;

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
        if($this->value > $max){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must Be Less Than {$max} Characters";
        }
        return $this;
    }
    public function min(int $min)
    {
        if($this->value < $min){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must Be More Than {$min} Characters";
        }
        return $this;
    }
    

    public function digits(int $digits)
    {
        if(strlen($this->value) != $digits){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must Be {$digits} digits";
        }
        return $this;
    }

    public function integer()
    {
        if(!ctype_digit($this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must Be Integer";
        }
        return $this;
    }

    public function regex(string $pattern,$message = null)
    {
        if(!preg_match($pattern,$this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = $message ?? "{$this->valueName} Invalid";
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
        $model = new Model;
        $query = "SELECT * FROM {$table} WHERE {$column} = ?";
        $stmt = $model->conn->prepare($query);
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        if($stmt->get_result()->num_rows == 1 ){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Already Exists";
        }
        return $this;
    }

    public function exists(string $table,string $column)
    {
        $model = new Model;
        $query = "SELECT * FROM {$table} WHERE {$column} = ?";
        $stmt = $model->conn->prepare($query);
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        if($stmt->get_result()->num_rows == 0 ){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Not Exists";
        }
        return $this;
    }
    public function validUrlEmail(array $data)
    {
        if($data){
            if(isset($data['email'])){
                $validation = new Validation;
                $validation->setValueName('email')->setValue($data['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->exists('users','email');
                if(!empty($validation->getErrors())){
                    include "layouts/errors/404.php";die;
                }
            }else{
                include "layouts/errors/404.php";die;
            }
        }else{
            include "layouts/errors/404.php";die;
        }
        return $this;
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


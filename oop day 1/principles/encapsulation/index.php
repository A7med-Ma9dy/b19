<?php
# accesss modifiers = [public - private - protected]
class user {
    private $password;
    public $gender; // m , f 
    public function setPassword($password)
    {
        if(strlen($password) >= 8){
            $this->password = $password;
        }else{
            echo "weak password";die;
        }
    }
    public function getPassword()
    {
        return sha1($this->password);
    }
}
// private 
// settter
// getter

$user = new user;
// $user->password =123456;

// echo $user->password;
$user->setPassword(123456789);

echo $user->getPassword();
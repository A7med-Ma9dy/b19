<?php 
# accesss modifiers = [public - private - protected]
// public [global scope-class scope-child scope]
// protected [class scope-child scope] 
// private [class scope]
class person {
    private $name = 'menna';
    public function getName()
    {
        return $this->name;
    }
}


class user extends person {
    public function getName()
    {
        return $this->name;
    }
}

$person = new person;
// echo $person->name;
echo $person->getName();

$user = new user;
// print_r($user);
// echo $user->getName();
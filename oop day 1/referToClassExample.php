<?php

class wallet {
    public float $balance = 0;
    public const bonus = 50;
    public function getBalance() :float
    {
        return $this->balance;
    }

    public function addBonusToBalance() :void
    {
        $this->deposite(self::bonus);
    }

    public function deposite(float $depositeVlaue) :void
    {
        $this->balance += $depositeVlaue;
    }

    public function withdraw(float $withdrawVlaue) :void
    {
        $this->balance -= $withdrawVlaue;
    }
}

$user = new wallet;
echo $user->getBalance() .'<br>'; // 0
$user->addBonusToBalance();
echo $user->getBalance() .'<br>'; // 50
$user->deposite(900);
echo $user->getBalance() .'<br>'; // 950
$user->withdraw(950);
echo $user->getBalance() .'<br>'; // 0


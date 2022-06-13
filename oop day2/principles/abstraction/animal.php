<?php

abstract class animal {
    public abstract function eat();
    protected abstract function drink();
    public function breathe()
    {
        echo "breathe";
    }
}

class cat extends animal {
    public function eat()
    {
        echo "cheese <br>";
    }
    public function drink()
    {
        echo "milk <br>";
    }
}

class dog extends animal {
    public function eat()
    {
        echo "meat <br>";
    }
    public function drink()
    {
        echo "water <br>";
    }
}
<?php
class paint {
    public $color;

    public function increaseBlack()
    {
        $this->color .= " + black";
        return $this;
    }
    public function increaseWhite()
    {
        $this->color .= " + white";
        return $this;
    }
}

$car = new paint;
$car -> color = 'red';

echo $car->increaseBlack()->increaseBlack()->increaseWhite()->increaseBlack()->color;
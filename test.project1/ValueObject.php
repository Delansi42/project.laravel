<?php
class ValueObject
{
    private $red;
    private $green;
    private $blue;

    public function __construct(
        $red,
        $green,
        $blue
    ) {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    private function validate($value)
    {
        if ($value < 0 || $value > 255) {
            throw new InvalidArgumentException('Діапазон не валідний');
        }
    }

    private function setRed($value)
    {
        $this->validate($value);
        $this->red = $value;
    }

    private function setGreen($value)
    {
        $this->validate($value);
        $this->green = $value;
    }

    private function setBlue($value)
    {
        $this->validate($value);
        $this->blue = $value;
    }

    public function getRed()
    {
        return $this->red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function getBlue()
    {
        return $this->blue;
    }


    public function equals(ValueObject $object1, ValueObject $object2): bool
    {
        return $object1->getRed() === $object2->getRed() &&
            $object1->getGreen() === $object2->getGreen() &&
            $object1->getBlue() === $object2->getBlue();
    }

    public static function random(): ValueObject
    {
        return new ValueObject(rand(0,255), rand(0,255), rand(0,255));
    }

    public function mix(ValueObject $object1, ValueObject $object2): ValueObject
    {
        $red = ($object1->getRed() + $object2->getRed()) / 2;
        $green = ($object1->getGreen() + $object2->getGreen()) / 2;
        $blue = ($object1->getBlue() + $object2->getBlue()) / 2;
        return new ValueObject($red, $green, $blue);
    }

}

$value1 = new ValueObject(15, 200, 25);
$value2 = new ValueObject(10, 100, 25);

$randomValue = ValueObject::random();

var_dump($value1->equals($value1, $value2));

var_dump($value1->mix($value1, $value2)->getRed());
var_dump($value1->mix($value1, $value2)->getGreen());
var_dump($value1->mix($value1, $value2)->getBlue());

var_dump($randomValue->getRed());
var_dump($randomValue->getGreen());
var_dump($randomValue->getBlue());

exit;

//

<?php

namespace Tests;

use InvalidArgumentException;

class Money
{
    private $amount;
    private $currency;

    public function __construct(
         $amount,
         Currency $currency
    ) {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    private function setAmount($value)
    {
        $this->amount = $value;
    }

    private function setCurrency($value)
    {
        $this->currency = $value;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function equals(Money $object1, Money $object2):bool
    {
        return $object1->getAmount() === $object2->getAmount() &&
            $object1->getCurrency()->getIsoCode() === $object2->getCurrency()->getIsoCode();
    }

    public function add(Money $object1)
    {
        if ($object1->getCurrency() !=  $this->currency) {
            throw new InvalidArgumentException('Неправильная валюта');
        }
        return $object1->getAmount() + $this->amount;
    }
}






<?php

namespace Tests;

class Currency
{
    private $isoCode;
    private $array = ['USD',
                      'EUR',
                      'UAH'];

    public function __construct(
        string $isoCode
    ) {
        $this->setIsoCode($isoCode);
    }

    private function validate(string $value)
    {
        if (!in_array($value, $this->array)) {
            throw new InvalidArgumentException('Неправильный формат');
        }
    }

    private function setIsoCode($value)
    {
        $this->validate($value);
        $this->isoCode = $value;
    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }

    public function equals(Currency $currencyOne, Currency $currencyTwo): bool
    {
        return $currencyOne->getIsoCode() === $currencyTwo->getIsoCode();
    }

}

$value1 = new Currency('USD');
$value2 = new Currency('USD');

var_dump($value1->equals($value1, $value2));
exit;



<?php

use Tests\Currency;
use Tests\Money;

require 'autoload.php';

$value1 = new \Tests\Currency('USD');
$value2 = new \Tests\Currency('UAH');

var_dump($value1->equals($value1, $value2));

$currency1 = new \Tests\Currency('EUR');
$currency2 = new \Tests\Currency('EUR');

$object1 = new \Tests\Money('200', $currency1);
$object2 = new \Tests\Money('200', $currency2);

var_dump($object1->equals($object1, $object2));
var_dump($object1->add($object2));
<?php
interface PizzaInterface
{
    public function getCost();

    public function getIngredients();

    public function getTitle();
}

class Pizza1 implements PizzaInterface
{
    public function getCost(): float
    {
        return 194;
    }

    public function getIngredients(): array
    {
        $ingredients = ['Сирний соус',
                        'Куряче стегно',
                        'Смажені печериці',
                        'Чері',
                        'Цибуля фрі',
                        'Сир Моцарелла',
                        'Пармезан'];

        return $ingredients;
    }

    public function getTitle():string
    {
        return 'Chicken Grill';
    }
}

class Pizza2 implements PizzaInterface
{
    public function getCost():float
    {
        return 175;
    }

    public function getIngredients():array
    {
        $ingredients = ['Вершково-сирний соус',
                        'Куряче стегно',
                        'Сир Моцарелла',
                        'Сальса з ананасу та кукурудзи',
                        'Гуакамолє',
                        'Чіпси Начос',
                        'Зелений перець чілі',
                        'Кінза'];

        return $ingredients;
    }

    public function getTitle():string
    {
        return 'Мексиканська';
    }
}

class Pizza3 implements PizzaInterface
{
    public function getCost():float
    {
        return 285;
    }

    public function getIngredients():array
    {
        $ingredients = ['Мюнхенські ковбаски',
                        'Баварські ковбаски',
                        'Пепероні',
                        'Томат черрі',
                        'Солоні огірки',
                        'Цибуля',
                        'Гострий перець чилі',
                        'Сир Моцарелла',
                        'Сир Емменталь',
                        'Соус пілатті'];
        return $ingredients;
    }

    public function getTitle():string
    {
        return 'Мюнхенська';
    }
}

class PizzaCalculator
{
    public $order;

    public function add(PizzaInterface $order)
    {
        $this->order[] = $order;
    }

    public function ingredients(): array
    {
        $ingredients = [];
        foreach ($this->order as $orders) {
            $ingredients = array_merge($ingredients, $orders->getIngredients());
        }
        return array_unique($ingredients);
    }

    public function price(): int
    {
        $sum = 0;
        foreach ($this->order as $orders) {
            $sum = $sum + $orders->getCost();
        }
        return $sum;
    }
}

$pizza1 = new Pizza1();
$pizza2 = new Pizza2();
$pizza3 = new Pizza3();


$post = new PizzaCalculator();
$post->add($pizza1);
$post->add($pizza2);
$post->add($pizza3);
print_r($post->ingredients());
print_r($post->price());

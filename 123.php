<?php

interface PriceWithDiscount
{
    public function getPriceWithDiscount();

}

interface DiscountWeight extends PriceWithDiscount
{
    public function getDiscountWeight();
}

class Product
{
    private $price;
    private $title;
    private $discount = 10;
    private $delivery;

    public function __construct($price, $title)
    {
        $this->price = $price;
        $this->title = $title;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }
    public function getDelivery()
    {
        return $this->delivery;
    }
}

class Bananas extends Product implements DiscountWeight
{
    private $weight;

    public function __construct($price, $title, $weight)
    {
        parent::__construct($price, $title);
        $this->weight = $weight;
    }

    public function getPriceWithDiscount()
    {
        // TODO: Implement getPriceWithDiscount() method.
        return $this->getPrice() - ($this->getPrice() / 100) * $this->getDiscount();
    }

    public function getDiscountWeight()
    {
        // TODO: Implement getDiscountWeight() method.
        if ($this->getWeight() > 10) {
            $this->setDelivery(300);
            return 'Цена со скидкой : ' . $this->getPriceWithDiscount();

        } else {
            $this->setDelivery(250);
            return 'Цена : ' . $this->getPrice() . '.' . 'Скидки нет , так как вес меньше 10 кг.';

        }
    }

    public function getWeight()
    {
        return $this->weight;
    }

}

class Wine extends Product implements PriceWithDiscount
{
    private $sort = 'Красное';

    public function __construct($price, $title)
    {
        parent::__construct($price, $title);
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function getPriceWithDiscount()
    {
        // TODO: Implement getPriceWithDiscount() method.
        return $this->getPrice() - ($this->getPrice() / 100) * $this->getDiscount();
    }

}

class Notebooks extends Product
{
    private $pages;
    private $form;

    public function __construct($price, $title, $pages, $form)
    {
        parent::__construct($price, $title);

        $this->pages = $pages;
        $this->form = $form;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function getForm()
    {
        return $this->form;
    }

}

$notebook1 = new Notebooks(100, 'школьная тетрадь', 48, 'тетрадь в клетку');
echo 'Товар : ' . $notebook1->getTitle() . '<br>';
echo 'Цена : ' . $notebook1->getPrice() . '<br>';
echo 'Страниц : ' . $notebook1->getPages() . '<br>';
echo 'Формат : ' . $notebook1->getForm() . '<br>';
$notebook1->setDelivery(250);
echo 'Доставка : ' . $notebook1->getDelivery() . '<br>';

echo '<hr>';

$banana1 = new Bananas(1000, 'бананы', 15);
echo 'Товар : ' . $banana1->getTitle() . '<br>';
echo 'Цена : ' . $banana1->getPrice() . '<br>';
echo 'Вес : ' . $banana1->getWeight() . 'кг<br>';
echo 'скидка : ' . $banana1->getDiscountWeight() . '<br>';
echo 'Доставка : ' . $banana1->getDelivery() . '<br>';

echo '<hr>';

$wine1 = new Wine(450, 'винишко донпериньен');
echo 'Товар : ' . $wine1->getTitle() . '<br>';
echo 'Цена : ' . $wine1->getPrice() . '<br>';
echo 'Скидка : ' . $wine1->getDiscount() . '%<br>';
echo 'Финальная цена : ' . $wine1->getPriceWithDiscount() . '<br>';
$wine1->setDelivery(300);
echo 'Доставка : ' . $wine1->getDelivery() . '<br>';


<?php

class Product
{
    private $price;
    private $title;

    public function __construct($price, $title)
    {
        return $this->price = $price;
        return $this->title = $title;

    }

    public function getPrice()
    {
        return $this->price;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
        return $this;
    }


}

class Bananas extends Product
{
    private $weight;

    public function getWeight()
    {
        return $this->weight;
        return $this;
    }

}

class Wine extends Product
{
    private $sort;

    public function getSort()
    {
        return $this->sort;
        return $this;
    }

}

class Notebooks extends Product
{
    private $pages;
    private $form;

    public function __construct($price, $title, $pages, $form)
    {
        parent::__construct($price, $title);

        return $this->pages = $pages;
        return $this->form = $form;
    }

    public function getPages()
    {
        return $this->pages;
        return $this;
    }

    public function getForm()
    {
        return $this->form;
        return $this;
    }

}
$notebook1 = new Notebooks(150,'тетрадь школьная',48,'в клетку');
$notebook1->getTitle()->getPrice()->getPages()->getForm();
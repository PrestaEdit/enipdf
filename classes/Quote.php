<?php

class Quote
{
    public $product_name;

    public function __construct()
    {
        $productsName = ['Produit A', 'Produit B', 'Produit C'];
        $this->product_name = $productsName[rand(0, 2)];
    }
}
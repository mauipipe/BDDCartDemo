<?php

namespace BDDCartDemo;
use BDDCartDemo\Entity\Product;

class Cart
{
    private $products;
    
    public function __construct(){
        $this->products = array();
    }
    
    public function add(Product $product)
    {
        $this->products[$product->getId()] = $product;
    }

    public function getQty()
    {
        return sizeof($this->products);
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function remove($key)
    {
        unset($this->products[$key]);
    }
}

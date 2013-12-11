<?php

namespace BDDCartDemo\Service;
use BDDCartDemo\Entity\Product;

class ProductService
{
    const PRODUCT_PATH = "/../../../data/product.json";
    private $products = array();
    
    public function getProducts()
    {
       $fileContent = file_get_contents(__DIR__ . self::PRODUCT_PATH);
       $this->products = json_decode($fileContent, true);
       
       return $this->products;
    }
      
}

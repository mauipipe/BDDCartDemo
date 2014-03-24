<?php

namespace BDDCartDemo;
use BDDCartDemo\Entity\Product;
use BDDCartDemo\Manager\FileManager;

class Cart
{
    private $products;
    private $total;
      
    public function __construct(){
        $this->products = array();
        $this->total = 0;
    }
    /**
     * 
     * @param \BDDCartDemo\Entity\Product $product
     */
    public function add(Product $product)
    {
        $this->products[$product->getId()] = $product;
    }
    
    /**
     * 
     * @return int
     */
    public function getQty()
    {
        return sizeof($this->products);
    }
    
    /**
     * 
     * @return array 
     */
    public function getProducts()
    {
        return $this->products;
    }
    
    /**
     * 
     * @param int $key
     */
    public function remove($key)
    {
        unset($this->products[$key]);
    }


    public function getTotal()
    {
        $this->calculateTotal();
        return $this->total;
    }
    
    private function calculateTotal(){
      
       foreach ($this->products as $product){
          
           $this->total += $product->getPrice();
       }
         
    }
}

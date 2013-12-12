<?php

namespace BDDCartDemo;
use BDDCartDemo\Entity\Product;
use BDDCartDemo\Manager\FileManager;

class Cart
{
    private $products;
      
    public function __construct(){
        $this->products = array();
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
    
    /**
     * 
     * @return boolean
     */
    public function process()
    {
       $fileManager = new FileManager();
       $path = __DIR__ . "/../../data/order.json";
       $fileManager->setPath($path);
       $content = $fileManager->read();
       
       $message = "Pagamento avvenuto con successo";
       $total = 0;
       
       foreach ($this->products as $product){
           $total += $product->getPrice();
       }
       
       $orderNr = sizeof($content);
       
       $order = array(
           "ord_nr"=>$orderNr,
           "total"=>$total
               );
       
       if($fileManager->save($order)) {
         return true;
       }
       
       return false;
       
    }
}

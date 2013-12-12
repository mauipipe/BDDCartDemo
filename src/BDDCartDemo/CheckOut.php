<?php

namespace BDDCartDemo;
use BDDCartDemo\Manager\FileManager;
use BDDCartDemo\Cart;


class CheckOut
{
    const ORDER_PATH = "/../../data/order.json";
    private $fileManager;
    private $cart;
    
    
    public function __construct(FileManager $fileManager, Cart $cart)
    {
        $this->fileManager = $fileManager;
        $this->cart = $cart;
    }
      /**
     * 
     * @return boolean
     */
    public function process()
    {
      
       $path = __DIR__ . self::ORDER_PATH ;
       
       $this->fileManager->setPath($path);
       $content = $this->fileManager->read();
            
       $total = $this->cart->getTotal();
       $orderNr = sizeof($content);
       
       $order = array(
           "ord_nr"=>$orderNr,
           "total"=>$total
               );
       
       if($this->fileManager->save($order)) {
         return true;
       }
       
       return false;
       
    }
}

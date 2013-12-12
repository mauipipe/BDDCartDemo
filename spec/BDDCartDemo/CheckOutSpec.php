<?php

namespace spec\BDDCartDemo;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use BDDCartDemo\Manager\FileManager;
use BDDCartDemo\Cart;

class CheckOutSpec extends ObjectBehavior
{
    const ORDER_PATH = "/../../data/order.json";
    
    private $mockCart;
    private $mockFileManager;
    
    function let(Cart $cart){
        $this->mockCart = $cart;
        $fileManager = new FileManager();
        $this->beConstructedWith($fileManager, $cart);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('BDDCartDemo\CheckOut');
    }
    
    function it_process_an_order(){
               
        $this->mockCart->getTotal()->willReturn(1300);
            
        $this->process()->shouldReturn(true);
    }       
    
    function letgo(){
        $orderPath = __DIR__ . self::ORDER_PATH;
        
        if(file_exists($orderPath)) {
            unlink($orderPath);
        }
    }
}

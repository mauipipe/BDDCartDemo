<?php

namespace spec\BDDCartDemo;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use BDDCartDemo\Entity\Product;

class CartSpec extends ObjectBehavior
{
    
    private $product;
    private $mockId;
    
    function let(Product $product) {
      
        $this->mockId = 1;
        $this->product = $product;
        $this->product->getId()->willReturn($this->mockId);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('BDDCartDemo\Cart');
    }
    
    function it_should_add(){
           
        $this->add($this->product);
        $this->getQty()->shouldReturn(1);
        
    }
    
    function it_should_produce_a_list_of(){
             
        $this->add($this->product);
        $this->getProducts()->shouldBeEqualTo(array($this->mockId => $this->product));
        
    }
    
    function it_should_remove(){
          
        $this->add($this->product);
        $this->remove($this->mockId);
        $this->getQty()->shouldReturn(0);
        
    }
 
    
    function it_can_get_total_price_from_cart(){
    
       $mockProducts = array(
            array(
                "id"=>1,
                "price"=>600
            ),
            array(
                "id"=>2,
                "price"=>700
            )
        );
        
       $total = 0;
       
       foreach($mockProducts as $mockProduct) {
            $product = new Product();
            $product->setId($mockProduct['id']);
            $product->setPrice($mockProduct['price']);       
            $this->add($product);
            $total += $mockProduct['price'];
            
        }
        
        $this->getTotal()->shouldBeEqualTo($total);
        
    }
     
}

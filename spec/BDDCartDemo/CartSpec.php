<?php

namespace spec\BDDCartDemo;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use BDDCartDemo\Entity\Product;

class CartSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('BDDCartDemo\Cart');
    }
    
    function it_should_add(Product $product){
           
        $this->add($product);
        $this->getQty()->shouldReturn(1);
        
    }
    
    function it_should_produce_a_list_of(Product $product){
        
        $mockId = 1;
        $product->getId()->willReturn($mockId);
        $this->add($product);
        $this->getProducts()->shouldBeEqualTo(array($mockId => $product));
        
    }
    
    function it_should_remove(Product $product){
        
        $mockId = 1;
        $product->getId()->willReturn($mockId);
        $this->add($product);
        $this->remove($mockId);
        $this->getQty()->shouldReturn(0);
    }
    
    
    function it_process_an_order(Product $product){
        
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
        
        
        foreach($mockProducts as $mockProduct) {
            
            $product->getId()->willReturn($mockProduct['id']);
            $product->getPrice()->willReturn($mockProduct['price']);
            $this->add($product);
            
        }
        
        $this->process()->shouldReturn(true);
    }
}

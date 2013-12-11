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
        
        $product->setName("Product");
        $product->setPrice(600);
        
        $this->add($product);
        $this->getQty()->shouldReturn(1);
        
    }
    
    function it_should_produce_a_list_of(Product $product){
        
        $product->setName("Product");
        $product->setPrice(600);
        $product->setId(1);
        
        $this->add($product);
        
        $this->getProducts()->shouldBeEqualTo(array($product));
        
    }
    
    function it_should_remove(Product $product){
        
        $this->add($product);
        $this->remove(0);
        $this->getQty()->shouldReturn(0);
    }
}

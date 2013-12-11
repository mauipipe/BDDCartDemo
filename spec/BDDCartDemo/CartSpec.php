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
    
    function it_should_add_a_product(Product $product){
        
        $product->setName("Product");
        $product->setPrice(600);
        
        $this->add($product);
        $this->getQty()->shouldReturn(1);
        
    }
    
    function it_should_produce_a_product_list(Product $product){
        
        $product->setName("Product");
        $product->setPrice(600);
        $product->setId(1);
        
        $this->add($product);
        
        $this->getProducts()->shouldBeEqualTo(array($product));
        
    }
}

<?php

namespace spec\DemoModule\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DemoModule\Entity\Product');
    }
    
    function it_can_be_hydrated_with_an_array(){
        $mockProductData = array(
            "name"=>"Product",
            "price" => 600
        );
        
        $this->setName($mockProductData['name']);
        $this->setPrice($mockProductData['price']);
        
        $this->getName()->shouldBeEqualTo($mockProductData['name']);
        $this->getPrice()->shouldBeEqualTo($mockProductData['price']);
        
    }
}

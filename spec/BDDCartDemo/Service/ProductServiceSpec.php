<?php

namespace spec\BDDCartDemo\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('BDDCartDemo\Service\ProductService');
    }
    
    function it_load_a_list_of_product() {
        $expectedData = $this->loadMockData();
        $this->getProducts()->shouldBeEqualTo($expectedData);
    }

    private function loadMockData() {
        return array(
            array(
                "id" => 1,
                "name" => "Borsa shopping bamboo in pelle fucsia",
                "price" => 600
            ),
            array(
                "id" => 2,
                "name" => "Borsa shopping nice in vernice microguccissima",
                "price" => 700
            ),
            array(
                "id" => 3,
                "name" => "Borsa a mani gucci nice in coccodrillo",
                "price" => 13500
            ),
        );
    }
    
}

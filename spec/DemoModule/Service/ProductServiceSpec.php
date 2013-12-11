<?php

namespace spec\DemoModule\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DemoModule\Service\ProductService');
    }
}

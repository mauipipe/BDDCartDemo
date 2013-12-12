<?php

namespace spec\BDDCartDemo\Manager;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileManagerSpec extends ObjectBehavior {

    private $path;

    function let() {
        $this->path = __DIR__ . "/../tmp/tmp.json";
        fopen($this->path, "w+");
    }

    function it_is_initializable() {
        $this->shouldHaveType('BDDCartDemo\Manager\FileManager');
    }
    

    function it_save_array_into_empty_file() {

        $this->setPath($this->path);
        $mockOrder = array("test" => 1);
        $this->save($mockOrder)->shouldReturn(true);
        $this->read()->shouldReturn(array($mockOrder));
    }

    function it_save_array_into_not_empty_file() {

        $this->setPath($this->path);

        $mockOrder = array("test" => 1);
        $this->save($mockOrder);

        $mockOrder2 = array("test" => 2);
        $this->save($mockOrder2);
        
        $expData = array(
            $mockOrder,
            $mockOrder2
        );
        
        $this->read()->shouldReturn($expData);
    }

    function letgo() {
       
        unlink($this->path);
        
    }

}

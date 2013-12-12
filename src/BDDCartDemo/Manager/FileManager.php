<?php

namespace BDDCartDemo\Manager;

class FileManager {

    private $path;

    public function setPath($path) {
                  
        $this->path = $path;
    }

    public function save(array $data) {
        
        $tmpData = $this->read();
       
        if (!isset($tmpData) ) {
            $tmpData = array();
        }

        array_push($tmpData, $data);

        if (file_put_contents($this->path, json_encode($tmpData))) {
            return true;
        }

        return false;
    }

    public function read() {
        if (file_exists($this->path)) {
            $content = file_get_contents($this->path);
            return json_decode($content, true);
        }
        
        return array();
    }

}

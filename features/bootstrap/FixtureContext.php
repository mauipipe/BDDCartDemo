<?php
use Behat\Behat\Context\BehatContext;

/**
 *
 * @author mauilap <mauipipe@gmail.com>
 * @copyright M.V. Labs 2013 - All Rights Reserved -
 *  You may execute and modify the contents of this file, but only within the scope of this project.
 *  Any other use shall be considered forbidden, unless otherwise specified.
 * @link http://www.mvassociates.it
 */
class FixtureContext extends BehatContext{
   const DATA_PATH = "/../../data/product.json";
   
   /**
     * @BeforeSuite
     */
    public static function loadData() {
        $dataPath = __DIR__ . self::DATA_PATH;
       
        if (file_exists($dataPath)) {
            unlink($dataPath);
        }

        $productFixtureData = array(
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

        file_put_contents(__DIR__ . self::DATA_PATH, json_encode($productFixtureData));
    }

    /**
     * @BeforeScenario
     */
    public function resetSession() {
        $orderPath = __DIR__ . "/../../data/order.json";
      
        if(file_exists($orderPath)){
            unlink($orderPath);
        }
        
    }
   
   
}

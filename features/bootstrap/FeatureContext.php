<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;


//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext {
     
    
     const DATA_PATH  =  "/../../data/product.json";
    private $cart;
    /**
     * @BeforeSuite
     */
    public static function loadData() {
        session_start();
        $dataPath =__DIR__ . self::DATA_PATH;
        
        if(file_exists($dataPath)){
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
    public function resetSession(){
        
        session_destroy();
        
    }
    
    public function getProducts(){
        
        $dataPath =__DIR__ . self::DATA_PATH;
        $data = array();
      
        if(file_exists($dataPath)){
            $fileContet = file_get_contents($filename);
            $data = json_decode($fileContet,true);
        }
        
        return $data;
        
    }
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters) {
       
    }

    /**
     * @Given /^my shopping cart is empty$/
     */
    public function myShoppingCartIsEmpty()
    {
                
    }

     /**
     * @When /^I add a "([^"]*)"$/
     */
    public function iAddA($product)
    {
        
    }

    /**
     * @Then /^my cart should contain (\d+) "([^"]*)" product$/
     */
    public function myCartShouldContainProduct($arg1, $arg2)
    {
        throw new PendingException();
    }
    
    private function getPage(){
        
        return $this->getSession()->getPage();
        
    }

   

    /**
     * @Given /^I am in the product page$/
     */
    public function iAmInTheProductPage()
    {
        throw new PendingException();
    }

    /**
     * @Given /^my cart is empty$/
     */
    public function myCartIsEmpty()
    {
        throw new PendingException();
    }
}

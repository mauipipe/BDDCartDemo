<?php
 session_start();

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

    

    private $products;
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters) {
       $this->useContext("fixture", new FixtureContext()); 
    }

    /**
     * @Given /^I am in the product page$/
     */
    public function iAmInTheProductPage() {
        $this->visit($this->locatePath("/"));
        $this->assertPageContainsText("Available Products");
    }

    /**
     * @Given /^my shopping cart is empty$/
     */
    public function myShoppingCartIsEmpty() {
        $this->assertNumElements(0, "table.cart tbody tr");
    }

    /**
     * @When /^I add a "([^"]*)"$/
     */
    public function iAddA($product) {
        $this->getPage()->clickLink($product);
        $this->products = $product;
    }

    /**
     * @Then /^my cart should contain (\d+) product$/
     */
    public function myCartShouldContainProduct($productNr) {
        
        $this->assertNumElements($productNr, "table.cart tbody tr");
        
    }

    /**
     * @Given /^my shopping cart already have (\d+) product$/
     */
    public function myShoppingCartAlreadyHaveProduct($productNr) {
        
        if($productNr > 0){
            $this->getPage()->clickLink("Borsa shopping bamboo in pelle fucsia");
        }
        $this->assertNumElements($productNr, "table.cart tbody tr");
        
    }


    private function getPage() {

        return $this->getSession()->getPage();
    }


    /**
     * @When /^I remove the product from it$/
     */
    public function iRemoveTheProductFromIt()
    {
        $this->getPage()->clickLink("Remove");
    }

    /**
     * @Given /^my cart have:$/
     */
    public function myCartHave(TableNode $productTable)
    {
        $this->visit($this->locatePath("/"));
        $products = $productTable->getHash();
        foreach($products as $product){
            $this->clickLink($product['product']);
        }
        $this->assertNumElements(sizeof($products), "table.cart tbody tr");
    }
    
     /**
     * @When /^I click "([^"]*)" to buy them$/
     */
    public function iClickToBuyThem($buttonName)
    {
        $this->clickLink($buttonName);
    }
    
    
    /**
     * @Then /^I should see a payment message with a total of (\d+) euro$/
     */
    public function iShouldSeeAPaymentMessageWithATotalOfEuro($totalOrder)
    {
       $orderMsg = "Pagamento di " . $totalOrder . " avvenuto con successo";
       $this->assertPageContainsText($orderMsg);
       
    }
   

    

   
}

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

    const DATA_PATH = "/../../data/product.json";

    private $products;

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

        unset($_SESSION);
    }

    public function getProducts() {

        $dataPath = __DIR__ . self::DATA_PATH;
        $data = array();

        if (file_exists($dataPath)) {
            $fileContet = file_get_contents($filename);
            $data = json_decode($fileContet, true);
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
         #$this->assertElementContainsText("table.cart tbody tr td", $this->products);
    }

    /**
     * @Given /^my shopping cart already have (\d+) product$/
     */
    public function myShoppingCartAlreadyHaveProduct($productNr) {
        
        $this->getPage()->clickLink("Borsa shopping bamboo in pelle fucsia");
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
    public function myCartHave(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When /^I click Checkout to buy them$/
     */
    public function iClickCheckoutToBuyThem()
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should see a payment message with a total of (\d+) euro$/
     */
    public function iShouldSeeAPaymentMessageWithATotalOfEuro($arg1)
    {
        throw new PendingException();
    }
}

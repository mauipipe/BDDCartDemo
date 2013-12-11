<?php
ob_start(); @session_start();

require_once 'vendor/autoload.php';
use BDDCartDemo\Service\ProductService;
use \BDDCartDemo\Cart;

if(!isset($_SESSION['cart'])) {
 $_SESSION['cart'] = serialize(new Cart);
    
}
$productService = new ProductService();
$products = $productService->getProducts();

function productBind(array $productData) {
   
    $product = new BDDCartDemo\Entity\Product();
    $product->setName($productData['name']);
    $product->setPrice($productData['price']);
    $product->setId($productData['id']);
    
    return $product;
}
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    $productId = $_GET['product_id'] ;
    $productData = $products[$productId-1];
    $cart = unserialize($_SESSION['cart']);
    
    switch($action) {
       
        case 'add':
            $product = productBind($productData);
            $cart->add($product);
            break;
       
        case 'remove':
            $cart->remove($productId);      
            break;

        case 'checkout':

            break;
        default:
            echo "Undefined Action";
            break;

    }
    
    $_SESSION['cart'] = serialize($cart);

}



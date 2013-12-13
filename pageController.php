<?php
ob_start(); @session_start();

require_once 'vendor/autoload.php';
use BDDCartDemo\Service\ProductService;
use \BDDCartDemo\Cart;
use BDDCartDemo\Manager\FileManager;

if(!isset($_SESSION['cart'])) {
 $_SESSION['cart'] = serialize(new Cart);
    
}
$productService = new ProductService();
$products = $productService->getProducts();
$fileManager = new FileManager();
$isOrderDone = false;

function productBind(array $productData) {
   
    $product = new BDDCartDemo\Entity\Product();
    $product->setName($productData['name']);
    $product->setPrice($productData['price']);
    $product->setId($productData['id']);
    
    return $product;
    
}
if(isset($_GET['action'])) {
    $action = $_GET['action'];
    $cart = unserialize($_SESSION['cart']);
    
    if(isset($_GET['product_id'])) {
        $productId = $_GET['product_id'] ;
        $productData = $products[$productId-1];
    }
    
    switch($action) {
       
        case 'add':
            $product = productBind($productData);
            $cart->add($product);
            break;
       
        case 'remove':
            $cart->remove($productId);      
            break;

        case 'checkout':
            if($cart->process()){
               
                $fileManager->setPath(__DIR__ . "/data/order.json");
                $orders = $fileManager->read();
                $lastOrder = end($orders);
                $isOrderDone = true;
                session_destroy();
            }
            break;
        default:
            echo "Undefined Action";
            break;

    }
    
    $_SESSION['cart'] = serialize($cart);

}



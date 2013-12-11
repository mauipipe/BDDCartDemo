<?php
require_once __DIR__ . '/pageController.php';
?>

<?php
/**
 *
 * @author mauilap <mauipipe@gmail.com>
 * @copyright M.V. Labs 2013 - All Rights Reserved -
 *  You may execute and modify the contents of this file, but only within the scope of this project.
 *  Any other use shall be considered forbidden, unless otherwise specified.
 * @link http://www.mvassociates.it
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Simple Cart Example</title>
    </head>
    <body>
        <h1>Welcome</h1>
        <h2>Available Products</h2>
        <ul>
            <?php
            if (sizeof($products) > 0):
                foreach ($products as $product):
                    ?>
                    <li><a href="./index.php?product_id=<?php echo $product['id']; ?>&action=add"><?php echo $product['name']; ?></a> <span><?php echo $product['price']; ?> €</span></li>
                    <?php
                endforeach;
            endif;
            ?> 

        </ul>

        <h1>Cart</h1>
        <table class="cart">
            <thead>
                <tr>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Remove</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

    </body>
</html>
<?php


require_once 'src\BasicProduct.php';

$product1 = new namespace\src\BasicProduct('hat', 'good hat', 3, 0);
$product2 = new namespace\src\BasicProduct('car', 'lambo', 30000, 10);

var_dump($product2->DisplayProduct());
<?php

namespace src;

global $customer;
require_once 'BasicProduct.php';
require_once 'Users.php';
require_once 'ProductTypes.php';

class Basket
{
    public array $products;
    public Users $user;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }
    public function AddProduct(BasicProduct $product) :void
    {
        $this->products[] = $product;
    }
    public function DisplayBasket() :void
    {
        echo "<ul>";
        foreach ($this->products as $product)
        {
            echo "<li>$product->title - £$product->discountedPrice</li>";
        }
        echo "</ul>";
    }

    public function TotalPrice() :float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->discountedPrice;
            if (!isset($this->user->VATNumber)) {
            $total += ($product->discountedPrice * 0.2);
            }
        }
        return $total;
    }

    public function TotalShippingCost() :float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->shippingCost;
        }
        return $total;
    }

    public function getOverallCost() :float
    {
        return $this->TotalPrice() + $this->TotalShippingCost();
    }

}

$customer1 = new BusinessUser('Sally', 'Thompson','Morgan Street', 'BS56FR', 'sally@gmail.com', 'Sally Bakes', 895867543);
$basket = new Basket($customer1);
$basket->AddProduct($product1);
$basket->AddProduct($product2);
$basket->DisplayBasket();
echo '<pre>';
var_dump($basket);
var_dump($customer1->getAddress());
var_dump($basket->TotalPrice());

$customer2 = new Customer('maisy', 'marge', 'hvknjnkj', 'hjbhcu', 'jyfyerb',);
$basket2 = new Basket($customer2);
$basket2->AddProduct($product1);
$basket2->AddProduct($product2);
echo '<pre>';
var_dump($basket2->TotalPrice());


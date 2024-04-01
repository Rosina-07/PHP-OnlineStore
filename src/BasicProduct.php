<?php

namespace src;

abstract class BasicProduct
{
    public string $title;
    public string $description;
    public int $price;
    public float $discount;

    public float $discountedPrice;

    public float $shippingCost;

    public function __construct(string $title, string $description, int $price, float $discount)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->discount = $discount;
        $this->DiscountProduct();
    }

    public function DiscountProduct() :float
    {
        return $this->discountedPrice = $this->price - $this->price * ($this->discount/100);
    }
    public function DisplayProduct() :string
    {
        if ($this->discount > 0) {
            return "<div class='product'>
                    <h3>$this->title</h3>
                    <span class='old-price'>£$this->price</span>
                    <span class='discount'>$this->discount% discount - £$this->discountedPrice</span>
                    <p>$this->description</p>
                </div> ";
        } else {
            return "<div class='product'>
                    <h3>$this->title</h3>
                    <span>£$this->price</span>
                    <p>$this->description</p>
                </div>";
        }
    }

    abstract  public function getShippingCost(): float;

}

$product1 = new namespace\BasicProduct('hat', 'good hat', 8, 0);
$product2 = new namespace\BasicProduct('car', 'lambo', 30000, 10);
var_dump($product1->DisplayProduct());





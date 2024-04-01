<?php

namespace src;

require_once 'BasicProduct.php';

class SmallProduct extends BasicProduct
{
    public float $weight;

    public function __construct(string $title, string $description, int $price, float $discount, float $weight)
    {
        parent::__construct($title, $description, $price, $discount, $weight);
        $this->weight = $weight;
    }

    public function getShippingCost() :float
    {
        if ($this->price > 100) {
            return 0;
        }

        if ($this->weight < 10) {
            return 1.99;
        }

        if ($this->weight < 50) {
            return 4.99;
        }

        return 7.99;
    }
}

class LargeProduct extends BasicProduct
{
    public float $width;
    public float $height;
    public float $depth;

    public function __construct(string $title, string $description, int $price, float $discount, float $width, float $height, float $depth)
    {
        parent::__construct($title, $description, $price, $discount, $width, $height, $depth);
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
    }

    public function getShippingCost() :float
    {
        if ($this->price > 10000) {
            return 0;
        }

        if ($this->width < 200 && $this->height < 200 && $this->depth < 200) {
            return 150;
        }

        if ($this->width > 500 || $this->height > 500 || $this->depth > 500) {
            return 600;
        }

        return 200;
    }
}
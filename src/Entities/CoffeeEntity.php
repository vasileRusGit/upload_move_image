<?php

namespace Acme\Entities;

class CoffeeEntity
{
    public $id;
    public $name;
    public $type;
    public $price;
    public $roast;
    public $country;
    public $image;
    public $review;

    /**
     * CoffeeEntity constructor.
     * @param $id
     * @param $name
     * @param $type
     * @param $price
     * @param $roast
     * @param $country
     * @param $image
     * @param $review
     */
    public function __construct($id, $name, $type, $price, $roast, $country, $image, $review)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->roast = $roast;
        $this->country = $country;
        $this->image = $image;
        $this->review = $review;
    }


}


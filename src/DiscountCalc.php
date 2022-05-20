<?php

namespace App;

use App\Discounts\MonetaryDiscount;
use App\Discounts\QuantityDiscount;
use App\Discounts\NoDiscount;

class DiscountCalc
{
    public function calc(Budget $budget): float
    {
        $discount = new QuantityDiscount(new MonetaryDiscount(new NoDiscount()));

        return $discount->calc($budget);
    }
}

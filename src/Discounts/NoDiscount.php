<?php

namespace App\Discounts;

use App\Budget;
use App\Discounts\Discount;

class NoDiscount extends Discount
{
    public function __construct()
    {
        
    }

    public function calc(Budget $budget): float
    {
        $this->log("no discount applied");
        return 0;
    }
}

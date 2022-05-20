<?php

namespace App\Discounts;

use App\Budget;

class MonetaryDiscount extends Discount
{
    public function calc(Budget $budget): float
    {
        $this->log("applying discount over value");
        if ($budget->value > 500) {
            return $budget->value * 0.05;
        }

        return $this->nextDiscount->calc($budget);
    }
}

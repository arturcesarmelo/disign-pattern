<?php

namespace App\Discounts;

use App\Budget;

class QuantityDiscount extends Discount
{
    public function calc(Budget $budget): float
    {
        $this->log("applying discount over quantity");
        if ($budget->quantity > 5) {
            return $budget->value * 0.1;
        }

        return $this->nextDiscount->calc($budget);
    }
}

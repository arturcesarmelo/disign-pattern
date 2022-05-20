<?php

namespace App;

class DiscountCalc
{
    public function calc(Budget $budget): float
    {
        if ($budget->quantity > 5) {
            return $budget->value * 0.1;
        }

        if ($budget->value > 500) {
            return $budget->value * 0.05;
        }

        return 0;
    }
}

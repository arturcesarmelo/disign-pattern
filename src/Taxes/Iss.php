<?php

namespace App\Taxes;

use App\Budget;

class Iss implements TaxCalcInterface
{
    public function calc(Budget $budget): float
    {
        return $budget->value * 0.06;
    }
}

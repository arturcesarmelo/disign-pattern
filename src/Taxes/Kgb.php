<?php

namespace App\Taxes;

use App\Budget;

class Kgb implements TaxCalcInterface
{
    public function calc(Budget $budget): float
    {
        return $budget->value * 0.01;
    }
}

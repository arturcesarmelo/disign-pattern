<?php

namespace App;

use App\Taxes\TaxCalcInterface;

class BudgetCalc
{
    public function calc(Budget $budget, TaxCalcInterface $tax): float
    {
        return $tax->calc($budget);
    }
}

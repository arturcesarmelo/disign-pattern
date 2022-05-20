<?php

namespace App\Taxes;

use App\Budget;

interface TaxCalcInterface
{
    public function calc(Budget $budget): float;
}

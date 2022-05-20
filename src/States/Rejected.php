<?php

namespace App\States;

use App\Budget;

class Rejected extends State
{
    public function calcExtraDiscount(Budget $budget): float
    {
        throw new \DomainException("BUDGET_REPROVED");
    }
}

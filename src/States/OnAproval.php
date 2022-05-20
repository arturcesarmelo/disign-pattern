<?php

namespace App\States;

use App\Budget;
use App\States\State;
use App\States\Approved;
use App\States\Rejected;

class OnAproval extends State
{
    public function calcExtraDiscount(Budget $budget): float
    {
        $this->log("Applying extra discount on approval");
        return $budget->value * .05; 
    }

    public function approve(Budget $budget)
    {
        $budget->state = new Approved();
    }

    public function reject(Budget $budget)
    {
        $budget->state = new Rejected();
    }
}

<?php

namespace App\States;

use App\Budget;
use App\States\State;
use App\States\Rejected;
use App\States\Finalized;

class Approved extends State
{
    public function calcExtraDiscount(Budget $budget): float
    {
        $this->log("Applying extra discount on approved");
        return $budget->value * .02; 
    }

    public function finalize(Budget $budget)
    {
        $budget->state = new Finalized();
    }

    public function reject(Budget $budget)
    {
        $budget->state = new Rejected();
    }
}

<?php

namespace App\States;

use App\Budget;
use DomainException;

abstract class State
{
    /**
     * Calc extra discount
     *
     * @param Budget $budget
     * @throws DomainException
     * @return float
     */
    abstract public function calcExtraDiscount(Budget $budget): float;

    public function approve(Budget $budget)
    {
        throw new DomainException("CANT_BE_APPROVED");
    }

    public function finalize(Budget $budget)
    {
        throw new DomainException("CANT_BE_FINALIZED");
    }

    public function reject(Budget $budget)
    {
        throw new DomainException("CANT_BE_REJECTED");
    }

    protected function log(string $message): void
    {
        ECHO $message . PHP_EOL;
    }
}

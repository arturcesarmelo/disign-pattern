<?php

namespace App;

use App\States\OnAproval;
use App\States\State;

class Budget
{
    public int $quantity;

    public float $value;

    public State $state;

    public function __construct()
    {
        $this->state = new OnAproval();
    }

    public function applyExtraDiscount()
    {
        $this->value -= $this->state->calcExtraDiscount($this);
    }

    public function approve()
    {
        $this->state->approve($this);
    }

    public function finalize()
    {
        $this->state->finalize($this);
    }

    public function reject()
    {
        $this->state->reject($this);
    }
}

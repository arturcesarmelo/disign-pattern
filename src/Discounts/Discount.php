<?php

namespace App\Discounts;

use App\Budget;

abstract class Discount
{
    protected Discount $nextDiscount;

    public function __construct(Discount $nextDiscount) {
        $this->nextDiscount = $nextDiscount;
    }

    abstract public function calc(Budget $budget): float;

    protected function log(string $message): void
    {
        ECHO $message . PHP_EOL;
    }
}

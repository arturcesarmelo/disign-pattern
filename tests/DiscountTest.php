<?php

namespace Test;

use App\Budget;
use App\DiscountCalc;
use PHPUnit\Framework\TestCase;

class DiscountTest extends TestCase
{

    public function testCalcDiscountOverQuantityMustBeApplied()
    {
        $budget = new Budget();
        $budget->value = 100;
        $budget->quantity = 6;

        $calc = new DiscountCalc();
        $result = $calc->calc($budget);

        self::assertEquals($result, 10);
    }

    public function testCalcDiscountOverValueMustBeApplied()
    {
        $budget = new Budget();
        $budget->value = 501;
        $budget->quantity = 5;

        $calc = new DiscountCalc();
        $result = $calc->calc($budget);

        self::assertEquals($result, 25.05);
    }

    public function testNoDiscountMustBeApplied()
    {
        $budget = new Budget();
        $budget->value = 100;
        $budget->quantity = 5;

        $calc = new DiscountCalc();
        $result = $calc->calc($budget);

        self::assertEquals($result, 0);
    }
}

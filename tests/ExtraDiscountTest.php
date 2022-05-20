<?php

namespace Test;

use App\Budget;
use App\DiscountCalc;
use DomainException;
use PHPUnit\Framework\TestCase;

class ExtraDiscountTest extends TestCase
{
    public function testExtraDiscountFivePercentMustBeApplied()
    {
        $budget = new Budget();
        $budget->quantity = 6;
        $budget->value = 100;

        $discountCalc = new DiscountCalc();
        $budget->value -= $discountCalc->calc($budget); //90

        $budget->applyExtraDiscount(); // 85.5

        self::assertEquals($budget->value, 85.5);
    }

    public function testExtraDiscountTwoPercentMustBeApplied()
    {
        $budget = new Budget();
        $budget->quantity = 6;
        $budget->value = 100;

        $discountCalc = new DiscountCalc();
        $budget->value -= $discountCalc->calc($budget); //90

        $budget->approve();

        $budget->applyExtraDiscount(); // 88.2

        self::assertEquals($budget->value, 88.2);
    }

    public function testExtraDiscountSouldNotBeAppliedForFinalizedState()
    {
        self::expectException(DomainException::class);
        $budget = new Budget();
        $budget->quantity = 6;
        $budget->value = 100;

        $discountCalc = new DiscountCalc();
        $budget->value -= $discountCalc->calc($budget);

        $budget->approve();
        $budget->finalize();

        $budget->applyExtraDiscount();
    }
}

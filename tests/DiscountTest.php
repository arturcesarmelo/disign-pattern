<?php

namespace Test;

use App\Budget;
use App\DiscountCalc;
use PHPUnit\Framework\TestCase;

class DiscountTest extends TestCase
{
    /**
     * @dataProvider discountFixture
     *
     * @return void
     */
    public function testCalcDiscountMustReturnFloat(Budget $budget, $expected)
    {

        $calc = new DiscountCalc();
        $result = $calc->calc($budget);

        self::assertEquals($result, $expected);
    }

    public function discountFixture()
    {
        $budget1 = new Budget();
        $budget1->quantity = 6;
        $budget1->value = 100;

        $budget2 = new Budget();
        $budget2->quantity = 4;
        $budget2->value = 500;
        return [
            [$budget1, 10],
            [$budget1, 5]
        ];
    }
}

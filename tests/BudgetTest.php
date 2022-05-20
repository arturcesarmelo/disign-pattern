<?php

namespace Test;

use App\Budget;
use App\BudgetCalc;
use App\Taxes\Icms;
use App\Taxes\Iss;
use App\Taxes\Kgb;
use PHPUnit\Framework\TestCase;

class BudgetTest extends TestCase
{
    /**
     * @dataProvider taxFixture
     */
    public function testCalcMustReturnFloat($tax, $value, $expected)
    {
        $budget = new Budget();
        $budget->value = $value;

        $calc = new BudgetCalc();
        $result = $calc->calc($budget, $tax);

        self::assertEquals($result, $expected);
    }

    public function taxFixture()
    {
        return [
            [new Icms(), 100, 10],
            [new Iss(), 100, 6],
            [new Kgb(), 100, 1],
        ];
    }
}

<?php

namespace Test;

use App\Budget;
use App\States\Approved;
use App\States\OnAproval;
use DomainException;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    public function testBudgetSouldNotBeFinalizedWhenIsOnApprovalState()
    {
        self::expectException(DomainException::class);

        $budget = new Budget();
        $budget->state = new OnAproval();

        $budget->finalize();
    }

    public function testBudgetSouldBeApprovedWhenIsOnApprovalState()
    {
        $budget = new Budget();
        $budget->state = new OnAproval();

        $budget->approve();

        self::assertEquals(get_class($budget->state), Approved::class);
    }
}

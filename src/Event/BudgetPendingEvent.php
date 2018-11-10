<?php

namespace App\Event;

use App\Entity\Budgets;

use Symfony\Component\EventDispatcher\Event;

class BudgetPendingEvent extends Event
{
    const NAME = 'budget.pending';
    private $budgets;
    public function __construct(Budgets $budgets)
    {
        $this->budgets = $budgets;
    }
    public function getBudget(): Budgets
    {
        return $this->budgets;
    }    
}
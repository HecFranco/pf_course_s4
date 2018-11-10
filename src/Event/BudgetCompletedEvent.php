<?php

namespace App\Event;

use App\Entity\Budgets;

use Symfony\Component\EventDispatcher\Event;

class BudgetCompletedEvent extends Event
{
    const NAME = 'budgets.completed';
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
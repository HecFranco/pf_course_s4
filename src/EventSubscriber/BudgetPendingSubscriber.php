<?php

namespace App\EventSubscriber;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use App\Event\BudgetPendingEvent;

use App\Services\EmailManager;
use App\Entity\Budgets;

class BudgetPendingSubscriber implements EventSubscriberInterface
{
    private $entityManager;
    private $emailManager;
    
    public function __construct(
        EntityManagerInterface $entityManager,
        EmailManager $emailManager
    )
    {
        $this->entityManager = $entityManager;
        $this->emailManager = $emailManager;
    }
        
    // return an array containing
    // the subscribed event(s)
    // and the method(s) to call when each event
    // is received
    public static function getSubscribedEvents(){
        return array(
            BudgetPendingEvent::NAME=>[
                'sendEmail', // method to call
                // optional priority, default 0
            ]
        );
    }
    public function sendEmail(
        BudgetPendingEvent $budgetPendingEvent
    )
    {
        $this->emailManager->budgetPending($BudgetPendingEvent->getBudget());
    }
}
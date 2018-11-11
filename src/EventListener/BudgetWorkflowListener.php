<?php

use Symfony\Component\Workflow\Event\GuardEvent; 
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use App\Services\EmailManager;

class BudgetWorkflowListener implements EventSubscriberInterface
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

    public function guardApproved(GuardEvent $event) 
    { 
        /** @var \App\Entity\Budgets $budtgets */
        $budget = $event‐>getSubject(); 
        // send email to approved budget
        $this->emailManager->budgetApproved($budget);
         
    } 
    public static function getSubscribedEvents() 
    { 
        return array( 
            'workflow.budgets.guard.to_approved' => array('guardApproved'), 
        ); 
    } 
} 
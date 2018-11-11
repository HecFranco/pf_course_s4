<?php
// src/EventListener/ProjectWorkflowListener.pdp

namespace App\EventListener;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Workflow\Event\GuardEvent; 
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use App\Services\EmailManager;

class TaskWorkflowListener implements EventSubscriberInterface
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

    public function guardUnallocated(GuardEvent $event) 
    { 
        /** @var \App\Entity\ProjectsTasks $task */
        $task = $event‐>getSubject(); 
        // send email to Unallocated Tasks
        $this->emailManager->taskUnallocated($task);
         
    }
    public function guardAssigned(GuardEvent $event) 
    { 
        /** @var \App\Entity\ProjectsTasks $task */
        $task = $event‐>getSubject(); 
        // send email to Assigned Tasks
        $this->emailManager->taskAssigned($task);
         
    }
    public function guardTerminated(GuardEvent $event) 
    { 
        /** @var \App\Entity\ProjectsTasks $task */
        $task = $event‐>getSubject(); 
        // send email to Terminated Tasks
        $this->emailManager->taskTerminated($task);
         
    } 
    public static function getSubscribedEvents() 
    { 
        return array( 
            'workflow.projects.guard.to_unallocated' => array('guardUnallocated'), 
            'workflow.projects.guard.to_assigned' => array('guardAssigned'), 
            'workflow.projects.guard.to_terminated' => array('guardTerminated'), 
        ); 
    } 
} 
<?php

use Symfony\Component\Workflow\Event\GuardEvent; 
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use App\Services\EmailManager;

class ProjectWorkflowListener implements EventSubscriberInterface
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
        /** @var \App\Entity\Projects $project */
        $project = $event‐>getSubject(); 
        // send email to approved budget
        $this->emailManager->projectApproved($project);
         
    }
    public function guardInProcess(GuardEvent $event) 
    { 
        /** @var \App\Entity\Projects $project */
        $project = $event‐>getSubject(); 
        // send email to approved budget
        $this->emailManager->projectInProcess($project);
         
    }
    public function guardTerminated(GuardEvent $event) 
    { 
        /** @var \App\Entity\Projects $project */
        $project = $event‐>getSubject(); 
        $tasksProject = $project->getTasks();
        $allTaskFinished = true;
        foreach($tasksProject as $key=>$value){
           if($value->getStateProject() !== 'terminated'){
                $allTaskFinished = false;
           } 
        }
        if (!$allTaskFinished) { 
            // Project with no all task with state terminate should not be allowed
            $event‐>setBlocked(true); 
        } 
        // send email to approved budget
        $this->emailManager->projectTerminated($project);
         
    } 
    public static function getSubscribedEvents() 
    { 
        return array( 
            'workflow.projects.guard.to_approved' => array('guardApproved'), 
            'workflow.projects.guard.to_in_process' => array('guardInProcess'), 
            'workflow.projects.guard.to_terminated' => array('guardTerminated'), 
        ); 
    } 
} 
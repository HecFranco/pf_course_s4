<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; 
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Users;
use App\Entity\Projects;

class EmailManager
{
    private $em;  
    private $mailer; 
    private $templating; 

    public function __construct(
        EntityManagerInterface $em, 
        \Swift_Mailer $mailer, 
        \Twig_Environment $templating,
        $emailFrom
    )
    {
        $this->em = $em;
        $this->mailer = $mailer;
        $this->templating = $templating;
        $this->emailFrom = $emailFrom;
    }

    /**
     * Send a mais to the commercials and clients
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function budgetPending($budget)
    {
        $sendEmailClient = $this->budgetPendingClient($budget);
        $sendEmailCommmerical = $this->budgetPendingCommercial($budget);
        return ($sendEmailClient && $sendEmailCommmerical);
    }
    /**
     * Send a mail to the commercials with the 
     * information of the new application
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function budgetPendingCommercial($budget)
    {
        // List commercial
        $listCommercialsUser = $this->em->getRepository(Users::class)->getListCommercialRole();
        // get User Complete Budget
        $user=$budget->getUser();
        foreach($listCommercialsUser as $key => $userCommercial){
            // returns the mailer
            $message = (new \Swift_Message('New Budget'))
            // ->setFrom('send@example.com')
            ->setFrom($this->emailFrom)
            // ->setTo('recipient@example.com')
            ->setTo($userCommercial->getUsername())
            ->setBody(
                $this->templating->render(
                    // templates/emails/budgetComplete.html.twig
                    'emails/budgetPendingCommercial.html.twig',
                    array(
                        'user' => $userCommercial,
                        'budget'=>$budget
                        )
                ),
                'text/html'
            );            
            return $this->mailer->send($message);
        }
    }
    /**
     * Send a mail to the client with the 
     * information of the new application
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function budgetPendingClient($budget)
    {
        // get User Complete Budget
        $user=$budget->getUser();
        // returns the first mailer
        $message = (new \Swift_Message('New Budget'))
        // ->setFrom('send@example.com')
        ->setFrom($this->emailFrom)
        // ->setTo('recipient@example.com')
        ->setTo($user->getUsername())
        ->setBody(
            $this->templating->render(
                // templates/emails/budgetComplete.html.twig
                'emails/budgetPendingClient.html.twig',
                array(
                    'user' => $userCommercial,
                    'budget'=>$budget
                    )
            ),
            'text/html'
        );            
        return $this->mailer->send($message);
    }    
    /**
     * Send a mail to the ManagerProject and Client with the 
     * information of the new application
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function projectApproved($project)
    {
        // List commercial
        $listManagerProjectsUser = $this->em->getRepository(Projects::class)->getListManagerProject($project);
        // get User Complete Budget
        $user=$project->getBudget()->getUser();  
        // List emails to send
        $listManagerProjectsUser[]=$user;    
        foreach($listManagerProjectsUser as $key => $userManagerProject){  
            // returns the mailer
            $message = (new \Swift_Message('Project Approved'))
            // ->setFrom('send@example.com')
            ->setFrom($this->emailFrom)
            // ->setTo('recipient@example.com')
            ->setTo($listManagerProjectsUser)
            ->setBody(
                $this->templating->render(
                    // templates/emails/budgetComplete.html.twig
                    'emails/projectApproved.html.twig',
                    array(
                        'user' => $user,
                        'userManagerProject' => $userManagerProject,
                        'budget' => $budget
                        )
                ),
                'text/html'
            );            
            return $this->mailer->send($message);
        }
    }  
    /**
     * Send a mail to the technical associated with the task 
     * with the information of the new task
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function taskAssigned($task){
        // TODO
    }
    /**
     * Send a mail to the Manager Porject with the task 
     * finished
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function taskFinished($task){
        // TODO
    }    
    /**
     * Send a mail to the User already register with the 
     * information of the aplication
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function registerComplete($user)
    {     
        // returns the first mailer
        $message = (new \Swift_Message('Congratulations, you are register now!!!'))
        // ->setFrom('send@example.com')
        ->setFrom($this->emailFrom)
        // ->setTo('recipient@example.com')
        ->setTo($user->getUsername())
        ->setBody(
            $this->templating->render(
                // templates/emails/budgetComplete.html.twig
                'emails/register.html.twig',
                array('user' => $user)
            ),
            'text/html'
        );            
        return $this->mailer->send($message);
    }       
}

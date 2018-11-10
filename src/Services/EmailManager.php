<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; 
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Users;

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
     * Send a mail to the commercials with the 
     * information of the new application
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function budgetPending($budget)
    {
        // get User Complete Budget
        $user=$budget->getUser();
        // returns the first mailer
        $message = (new \Swift_Message('Hello Email'))
        // ->setFrom('send@example.com')
        ->setFrom($this->emailFrom)
        // ->setTo('recipient@example.com')
        ->setTo($user->getUsername())
        ->setBody(
            $this->templating->render(
                // templates/emails/budgetComplete.html.twig
                'emails/budgetPending.html.twig',
                array('user' => $user)
            ),
            'text/html'
        );            
        return $this->mailer->send($message);
    }
    /**
     * Send a mail to the ManagerProject with the 
     * information of the new application
     *
     * Returns true if everything went well or false
     * if the mail could not be sent
     */
    public function budgetApproved($budget)
    {
        // get User Complete Budget
        $user=$budget->getUser();        
        // returns the first mailer
        $message = (new \Swift_Message('Hello Email'))
        // ->setFrom('send@example.com')
        ->setFrom($this->emailFrom)
        // ->setTo('recipient@example.com')
        ->setTo($user->getUsername())
        ->setBody(
            $this->templating->render(
                // templates/emails/budgetComplete.html.twig
                'emails/budgetApproved.html.twig',
                array('user' => $user)
            ),
            'text/html'
        );            
        return $this->mailer->send($message);
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
        $message = (new \Swift_Message('Hello Email'))
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

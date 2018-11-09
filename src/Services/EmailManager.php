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

    public function budgetCompleted($email)
    {
        $user = $this->em->getRepository(Users::class)->findOneBy(array('username'=>$email));
        // returns the first mailer
        $message = (new \Swift_Message('Hello Email'))
        // ->setFrom('send@example.com')
        ->setFrom('hector.franco.aceituno@gmail.com')
        // ->setTo('recipient@example.com')
        ->setTo($email)
        ->setBody(
            $this->templating->render(
                // templates/emails/budgetComplete.html.twig
                'emails/budgetComplete.html.twig',
                array('user' => $user)
            ),
            'text/html'
        )
        ;            
        $this->mailer->send($message);
    }
}

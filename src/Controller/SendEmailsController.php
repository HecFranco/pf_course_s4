<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SendEmailsController extends AbstractController
{
    /**
     * @Route("/send/emails", name="send_emails")
     */
    public function index( \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
        // ->setFrom('send@example.com')
        ->setFrom('hector.franco.aceituno@gmail.com')
        // ->setTo('recipient@example.com')
        ->setTo('seo@prodigia.com')
        ->setBody(
            $this->renderView(
                // templates/emails/registration.html.twig
                'emails/budgetComplete.html.twig',
                array('name' => 'Demo email')
            ),
            'text/html'
        )
        /*
         * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $mailer->send($message);
        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SendEmailsController.php',
        ]);
    }
}

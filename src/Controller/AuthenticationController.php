<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use App\Event\RegisterEvent;

use App\Entity\Users;

use App\Form\RegisterType;

use App\Services\AuthenticationService;

class AuthenticationController extends BaseController
{
    /**
     * @Route( {
     *          "es": "/login",
     *          "en": "/en/login",
     *      },
     *      name="login", 
     *      methods="GET|POST"
     * )
     */    
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // check for "view" access: calls all voters
        $this->denyAccessUnlessGranted('login', $this->getUser());
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        // generate view
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername, 'error' => $error
            ]
        );
    }
    /**
     * @Route( {
     *          "es": "/registro",
     *          "en": "/en/register",
     *      },
     *      name="register", 
     *      methods="GET|POST"
     * )
     */      
    public function register(
        Request $request, 
        AuthenticationService $AuthenticationService,
        EventDispatcherInterface $eventDispatcher
    ): Response
    {
        // check for "view" access: calls all voters
        $this->denyAccessUnlessGranted('access', $this->getUser());
        // generate new instance and form to the instance
        $user = new Users();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        // check request
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $AuthenticationService->createNewUserRegister($request);
            $registerEvent = new RegisterEvent($user);
            // $eventDispatcher->dispatch( 'user.register', $registerEvent );
            $eventDispatcher->dispatch( RegisterEvent::NAME, $registerEvent );
            return $this->redirectToRoute('home');
        }
        // generate view
        return $this->render('security/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }  

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    }     
}

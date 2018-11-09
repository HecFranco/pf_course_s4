<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegisterType;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends BaseController
{
    /**
     * @Route( {
     *          "es": "/perfil",
     *          "en": "/en/profile",
     *      },
     *      name="profile", 
     *      methods="GET|POST"
     * )
     */  
    public function edit(Request $request): Response
    {   $user = $this->getUser();
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('web/user.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}

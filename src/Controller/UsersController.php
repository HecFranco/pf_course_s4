<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Services\AuthenticationService;

/**
 * @Route("/user")
 */
class UsersController extends BaseController
{

    /**
     * @Route("/{id}", name="user_edit", methods="GET|POST")
     */
    public function edit(
        Request $request, 
        AuthenticationService $AuthenticationService, 
        Users $user
    ): Response
    {
        $form = $this->createForm(
            UsersType::class, 
            $user,
            array(
                'attr'=> ['formType'=>'editUser']
            )
        );
        $form->handleRequest($request);
        // Request Form
        if ($form->isSubmitted() && $form->isValid()) {
            // Get User
            $user = $AuthenticationService->editUser($request);
            // persist data
            $em->persist($user);
            $em->flush();
            // redirect
            return $this->redirectToRoute('dashboard_admin');
        }

        return $this->render('web/user.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="user_delete")
     */
    public function delete(Request $request, Users $user): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('dashboard_admin');
    }
}

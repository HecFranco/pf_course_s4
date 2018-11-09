<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        if($this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('admin');
        }
        else if($this->isGranted('ROLE_COMMERCIAL'))
        {
            return $this->redirectToRoute('commercial');
        }
        else if($this->isGranted('ROLE_PROJECT'))
        {
            return $this->redirectToRoute('proyect_management');
        }
        else if($this->isGranted('ROLE_EMPLOYEE'))
        {
            return $this->redirectToRoute('employee');
        }        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}

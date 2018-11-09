<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProyectManagementController extends AbstractController
{
    /**
     * @Route("/proyect/management", name="proyect_management")
     */
    public function index()
    {
        return $this->render('proyect_management/index.html.twig', [
            'controller_name' => 'ProyectManagementController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommercialController extends AbstractController
{
    /**
     * @Route("/commercial", name="commercial")
     */
    public function index()
    {
        return $this->render('commercial/index.html.twig', [
            'controller_name' => 'CommercialController',
        ]);
    }
}

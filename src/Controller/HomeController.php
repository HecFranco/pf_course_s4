<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends BaseController
{
    /**
     * @Route( {
     *          "es": "/",
     *          "en": "/en",
     *      },
     *      name="home"
     * )
     */
    public function index()
    {
        return $this->render('web/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}

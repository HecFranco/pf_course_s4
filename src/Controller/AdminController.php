<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Budgets;
use App\Form\UsersType;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends BaseController
{
    /**
     * @Route( {
     *          "es": "/admin",
     *          "en": "/en/admin",
     *      },
     *      name="dashboard_admin", 
     *      methods="GET|POST"
     * )
     */  
    public function index(Request $request): Response
    {
        // Entity Manager
        $em = $this->getDoctrine()->getManager();
        // Create form
        $users_repo = $em->getRepository(Users::class);
        $listUsers = $users_repo->findAll();
        $budgets_repo = $em->getRepository(Budgets::class);
        $listBudgets = $budgets_repo->findAll();
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render(
            'dashboard/admin.html.twig',
            array(
                'listUsers'=>$listUsers,
                'listBudgets'=>$listBudgets
            )
        );
    }
}

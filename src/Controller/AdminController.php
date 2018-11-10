<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Users;
use App\Entity\Budgets;
use App\Entity\ListTypeProject;

use App\Form\UsersType;
use App\Form\ListTypeProjectType;

use App\Services\ProjectManager;

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
        $typeProject_repo = $em->getRepository(ListTypeProject::class);
        $listTypeProject = $typeProject_repo->findAll();        
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render(
            'dashboard/admin.html.twig',
            array(
                'listUsers'=>$listUsers,
                'listBudgets'=>$listBudgets,
                'listTypeProject'=>$listTypeProject
            )
        );
    }
    /**
     * @Route( {
     *          "es": "/admin/type_project/{id}/edit",
     *          "en": "/en/admin/type_project/{id}/edit",
     *      },
     *      name="dashboard_list_type_project_edit", 
     *      methods="GET|POST"
     * )
     */  
    public function editTypeProject(
        Request $request, 
        ListTypeProject $listTypeProject,
        ProjectManager $projectManager
    ): Response
    {
        $form = $this->createForm(
            ListTypeProjectType::class, 
            $listTypeProject,
            array(
                'attr'=> ['formType'=>'editTypeProject']
            )
        );
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $projectManager->editTypeProject($request);
            return $this->redirectToRoute('dashboard_admin');
        }
        return $this->render('dashboard/admin_edit_project.html.twig', [
            'listTypeProject' => $listTypeProject,
            'form' => $form->createView(),
        ]);
    }    
    /**
     * @Route( {
     *          "es": "/admin/type_project/{id}/delete",
     *          "en": "/en/admin/type_project/{id}/delete",
     *      },
     *      name="dashboard_list_type_project_delete", 
     *      methods="GET|POST"
     * )
     */     
    public function deleteTypeProject(Request $request, ListTypeProject $listTypeProject): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($listTypeProject);
        $em->flush();
        return $this->redirectToRoute('list_type_project_index');
    }    
}

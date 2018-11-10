<?php

namespace App\Controller;

use App\Entity\ListTypeProject;
use App\Form\ListTypeProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/list/type/project")
 */
class ListTypeProjectController extends BaseController
{
    /**
     * @Route("/", name="list_type_project_index", methods="GET")
     */
    public function index(): Response
    {
        $listTypeProjects = $this->getDoctrine()
            ->getRepository(ListTypeProject::class)
            ->findAll();

        return $this->render('list_type_project/index.html.twig', ['list_type_projects' => $listTypeProjects]);
    }

    /**
     * @Route("/new", name="list_type_project_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $listTypeProject = new ListTypeProject();
        $form = $this->createForm(ListTypeProjectType::class, $listTypeProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listTypeProject);
            $em->flush();

            return $this->redirectToRoute('list_type_project_index');
        }

        return $this->render('list_type_project/new.html.twig', [
            'list_type_project' => $listTypeProject,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="list_type_project_show", methods="GET")
     */
    public function show(ListTypeProject $listTypeProject): Response
    {
        return $this->render('list_type_project/show.html.twig', ['list_type_project' => $listTypeProject]);
    }
}

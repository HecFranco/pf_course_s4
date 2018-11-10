<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Workflow\Registry;
use Symfony\Component\Workflow\Exception\TransitionException;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use App\Event\BudgetPendingEvent;

use App\Entity\Budgets;
use App\Entity\ListTypeProject;
use App\Entity\Profiles;
use App\Entity\Users;

use App\Form\BudgetsType;

use App\Services\EmailManager;
use App\Services\AuthenticationService;

class BudgetController extends BaseController
{

    /**
     * @Route( {
     *          "es": "/calculadora",
     *          "en": "/en/calculator",
     *      },
     *      name="calculator_new",
     *      methods="GET|POST"
     * )
     */  
    public function new(Request $request, Registry $workflows): Response
    {
        // Entity Manager
        $em = $this->getDoctrine()->getManager();
        // Create form
        $budget = new Budgets();
        // Capture Workflow
        $workflow = $workflows->get($budget);
        $form = $this->createForm(BudgetsType::class, $budget);
        $form->handleRequest($request);
        // Request Form
        if ($form->isSubmitted() && $form->isValid()) {
            $budget->setCreatedOn(new \DateTime());
            $budget->setUser($this->getUser());
            $workflow->apply($budget, 'to_draft');
            $em->persist($budget);
            $em->flush();
            if($request->getLocale() != $this->defaultLocale()){
                return $this->redirectToRoute('calculator_edit', array('id' => $budget->getId(), '_locale' => $this->locale()));           
            }else{
                return $this->redirectToRoute('calculator_edit', array('id' => $budget->getId()));           
            }
        }

        $listTypeProject_repo = $em->getRepository(ListTypeProject::class);
        $listTypeProject = $listTypeProject_repo->findAll();

        return $this->render('web/calculator/new.html.twig', [
            'form' => $form->createView(),
            'listTypeProject' => $listTypeProject
        ]);
    }
    /**
     * @Route( {
     *          "es": "/calculadora/{id}/servicios",
     *          "en": "/en/calculator/{id}/task",
     *      },
     *      name="calculator_edit",
     *      methods="GET|POST"
     * )
     */      
    public function edit(
        Request $request, 
        AuthenticationService $AuthenticationService, 
        Budgets $budget, 
        Registry $workflows,
        EventDispatcherInterface $eventDispatcher
    ): Response
    {
        $form = $this->createForm(BudgetsType::class, $budget);
        $form->handleRequest($request);
        // Request Form
        if ($form->isSubmitted() && $form->isValid()) {
            // Entity Manager
            $em = $this->getDoctrine()->getManager();
            // Get User
            $user = $AuthenticationService->createNewUserBudgets($request);
            // get workflow & change workflow
            $workflow = $workflows->get($budget);
            $workflow->apply($budget, 'to_pending');
            // persist data
            $budget->setUser($user);
            $em->persist($budget);
            $em->flush();            
            $budgetPendingEvent = new BudgetPendingEvent($budget);
            // $eventDispatcher->dispatch( 'user.register', $userRegisterEvent );
            $eventDispatcher->dispatch( BudgetPendingEvent::NAME, $budgetPendingEvent );
            // redirect
            return $this->redirectToRoute('home', array('_locale' => $request->getLocale()));
        }
        return $this->render('web/calculator/edit.html.twig', [
            'project' => $budget,
            'form' => $form->createView(),
        ]);
    } 
}

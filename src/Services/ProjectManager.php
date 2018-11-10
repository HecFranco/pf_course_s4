<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\ListTypeTask;
use App\Entity\ListTypeProject;

class ProjectManager
{
    private $em;

    public function __construct(
        EntityManagerInterface $em
    )
    {
        $this->em = $em;
    }
    public function editTypeProject($request)
    {
        $em = $this->em;
        // get data form
        $formData = $request->request->get('list_type_project');
        $name = $formData['name'];
        $description = $formData['description'];
        $basePrice = $formData['basePrice'];
        // get Project to Edit
        $projectToEdit = $em
            ->getRepository(ListTypeProject::class)
            ->findOneById(
                $request->get('id')
            );
        // set data Project
        $projectToEdit->setName($name);
        $projectToEdit->setDescription($description);
        $projectToEdit->setBasePrice($basePrice);
        // set tasks
        $tasks_repo = $em->getRepository(ListTypeTask::class);
        foreach($formData['tasks'] as $key => $value){
            $task = $tasks_repo->findOneById($key);
            $existTask = ($task === null)?false:true;
            if($existTask){
                $task->setName($formData['tasks'][$key]['name']);
                $task->setPrice($formData['tasks'][$key]['price']);
                $task->setNote($formData['tasks'][$key]['note']);
                $task->setDescription($formData['tasks'][$key]['description']);
                $task->setCreatedOn(new \DateTime());
            }else{
                $task = new ListTypeTask;
                $task->setTypeProject($projectToEdit);
                $task->setName($formData['tasks'][$key]['name']);
                $task->setPrice($formData['tasks'][$key]['price']);
                $task->setNote($formData['tasks'][$key]['note']);
                $task->setDescription($formData['tasks'][$key]['description']);
                $task->setCreatedOn(new \DateTime());
                $projectToEdit->addTask($task);
            }
        }
        $em->persist($projectToEdit);
        $em->flush();
    }
}
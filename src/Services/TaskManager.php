<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\ListTypeTask;

class TaskManager
{
    private $em;

    public function __construct(
        EntityManagerInterface $em
    )
    {
        $this->em = $em;
    }

    public function assignStandardProjectTasks($request)
    {
        // TODO
    }
}
<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Console\Helper\ProgressBar;

use App\Enum\DataBaseEnum;

use App\Entity\ListGenders;
use App\Entity\ListRoles;
use App\Entity\ListStateProject;
use App\Entity\ListTypeProject;

class InitializationDatabase
{
    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }
    public function uploadDataInitial ()
    {
        $this->uploadDataListGender();
        $this->uploadDataListRole();
        $this->uploadDataListStateProject();
        return 'Initialized database';
    }

    public function uploadDataListGender()
    {
        $listGenders = DataBaseEnum::getListGenders();
        $listGender_repo = $this->em->getRepository(ListGenders::class);
        foreach ( $listGenders as $item) {
            $gender = $listGender_repo->findOneBy(array('name'=>$item));
            $existGender = ( $gender === NULL )? false : true ;
            if ( !$existGender ) {
                $newGender = new ListGenders();
                $newGender->setName($item);
                $newGender->setCreatedOn(new \DateTime());
                $this->em->persist($newGender);
                $this->em->flush();
            }
        }
    }
    
    public function uploadDataListRole()
    {
        $listRoles = DataBaseEnum::getListRoles();
        $listRole_repo = $this->em->getRepository(ListRoles::class);
        foreach ( $listRoles as $item) {
            $role = $listRole_repo->findOneBy(array('role'=>$item));
            $existRole = ( $role === NULL )? false : true ;
            if ( !$existRole ) {
                $newRole = new ListRoles();
                $newRole->setRole($item);
                $newRole->setCreatedOn(new \DateTime());
                $this->em->persist($newRole);
                $this->em->flush();
            }
        }
    }
    public function uploadDataListStateProject()
    {
        $listStateProject = DataBaseEnum::getListStateProject();
        $listStateProject_repo = $this->em->getRepository(ListStateProject::class);
        foreach ( $listStateProject as $item) {
            $stateProject = $listStateProject_repo->findOneBy(array('name'=>$item));
            $existStateProject = ( $stateProject === NULL )? false : true ;
            if ( !$existStateProject ) {
                $newSateProject = new ListStateProject();
                $newSateProject->setName($item);
                $newSateProject->setCreatedOn(new \DateTime());
                $this->em->persist($newSateProject);
                $this->em->flush();
            }
        }
    } 
    public function uploadDataListTypeProject()
    {
        $listTypeProject = DataBaseEnum::getListTypeProject();
        $listTypeProject_repo = $this->em->getRepository(ListTypeProject::class);
        foreach ( $listTypeProject as $item) {
            $typeProject = $listTypeProject_repo->findOneBy(array('name'=>$item));
            $existTypeProject = ( $typeProject === NULL )? false : true ;
            if ( !$existTypeProject ) {
                $newTypeProject = new ListTypeProject();
                $newTypeProject->setName($item);
                $newTypeProject->setCreatedOn(new \DateTime());
                $this->em->persist($newTypeProject);
                $this->em->flush();
            }
        }
    }        
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Users;

class BaseController extends AbstractController
{
    public function defaultLocale()
    {
        return $this->getParameter('kernel.default_locale');
    }    
    public function existUserByUsername($username)
    {
        $em = $this->getDoctrine()->getManager();
        $user_repo = $em->getRepository(Users::Class);
        $existUser = $user_repo->findOneBy(array('username'=>$username));
        $result = ($existUser)?true:false;
        return $result;
    }
}
<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Users;
use App\Entity\Emails;
use App\Entity\Profiles;
use App\Entity\ListRoles;

class AuthenticationService
{
    private $em;
    private $encoder;
    private $user;
    public function __construct(
        EntityManagerInterface $em,
        TokenStorageInterface $tokenStorage,
        UserPasswordEncoderInterface $encoder
    )
    {
        $this->em = $em;
        $this->encoder = $encoder;
        $this->user = $tokenStorage->getToken()->getUser();
    }
    public function createNewUser($userData)
    {
        $firstname = $userData['firstname'];
        $lastname = $userData['lastname'];
        $email = $userData['emails'];
        $password = $userData['password'];
        $locale = $userData['locale'];
        $role = $this->em->getRepository(ListRoles::class)->findOneBy(array('role'=>'ROLE_USER'));
        // ...
        $newProfile = new Profiles();
        $newProfile->setFirstname($firstname);
        $newProfile->setLastname($lastname);
        $newProfile->setCreatedOn(new \DateTime());
        $newProfile->setModifiedOn(new \DateTime());
        // ... 
        $newUser = new Users();
        $newUser->setProfile($newProfile);
        $newUser->addRole($role);
        $newUser->setLocale($locale);
        $newUser->setUsername($email);
        $newUser->setPlainPassword($password);
        $newUser->setPassword($this->encoder->encodePassword($newUser, $password));
        $newUser->setCreatedOn(new \DateTime());
        $newUser->setModifiedOn(new \DateTime());
        // ...
        $newEmail = new Emails();
        $newEmail->setEmail($email);
        $newEmail->setUser($newUser);
        $newEmail->setCreatedOn(new \DateTime());
        // ...
        $newUser->addEmail($newEmail);
        /*
         * By using cascade persistence we do not persist here but at 
         * the end point.
         **/
        return $newUser;
    }
    public function createNewUserBudgets($request)
    {
        // get data form
        $formData = $request->request->get('budgets');
        // userLogged??
        $userLogged = (!isset($formData['user']))?true:false;
        if(!$userLogged){
            $user = $formData['user'];
            $profile = $user['profile'];
            $firstname = $profile['firstname'];
            $lastname = $profile['lastname'];
            $email = $user['emails']["__name__"]["email"];
            $locale = $request->getLocale();
            // entity to asociative array
            $userData = [
                'firstname'=>$firstname,
                'lastname'=>$lastname,
                'emails'=>$email,
                'password'=>$this->generate_password(),
                'locale'=>$locale
            ];
            // exist user??
            $existUser = $this->existUser($email);
            if(!$existUser){
                return $this->createNewUser($userData);
            }else{
                return $this->em->getRepository(Users::class)->findOneBy(array('username'=>$email));
            }
        }else{
            return $this->user;
        }

    }
    public function editUser($request)
    {
        // get data form
        dump($request);
        $formData = $request->request->get('register');
        $profile = $formData['profile'];
        $firstname = $profile['firstname'];
        $lastname = $profile['lastname'];
        $email = $formData['emails']["__name__"]["email"];
        $password = $formData['plainPassword']['first'];
        $locale = $request->getLocale();
        die();
    }
    public function createNewUserRegister($request)
    {
        // get data form
        $formData = $request->request->get('register');
        $profile = $formData['profile'];
        $firstname = $profile['firstname'];
        $lastname = $profile['lastname'];
        $email = $formData['emails']["__name__"]["email"];
        $password = $formData['plainPassword']['first'];
        $locale = $request->getLocale();
        // entity to asociative array
        $userData = [
            'firstname'=>$firstname,
            'lastname'=>$lastname,
            'emails'=>$email,
            'password'=>$formData['plainPassword']['first'],
            'locale'=>$locale
        ];
        // exist user??
        $existUser = $this->existUser($email);
        if(!$existUser){
            $user = $this->createNewUser($userData);
            $em = $this->em;
            $em->persist($user);
            $em->flush();
            return $user;
        }else{
            $user = $this->em->getRepository(Users::class)->findOneBy(array('username'=>$email));
            return $user;
        }
    }

    public function existUser($email)
    {
        // Clean Data
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        // Load User_repo
        $user_repo = $this->em->getRepository(Users::class);
        $issetUserEmail = $user_repo->findOneBy(array("username" => $email));
        // Exist user ?
        $existUser = $issetUserEmail !== null;
        // Response Function
        return $existUser;
    }

    public function generate_password($length = 20){
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                  '0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
        $str = '';
        $max = strlen($chars) - 1;
        for ($i=0; $i < $length; $i++)
          $str .= $chars[random_int(0, $max)];
        return $str;
    }
      
}
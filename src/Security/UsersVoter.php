<?php
// src/Security/PostVoter.php
namespace App\Security;

use App\Entity\Users;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class UsersVoter extends Voter
{
    // these strings are just invented: you can use anything
    const LOGIN = 'login';
    const EDIT_USER = 'editUser';
    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::LOGIN, self::EDIT_USER))) {
            return false;
        }
        return true;
    }
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        switch ($attribute) {
            case self::LOGIN:
                return $this->accessLogin($user);
            case self::EDIT_USER:
                return $this->canEditUser($user);
        }
    }

    private function accessLogin($user){
        if (!$user instanceof Users) {
            // the user must be logged to deny access
            return true;
        }
    }

    private function canEditUser($user){
        if ($user instanceof Users && in_array('ROLE_ADMIN', $user->getRoles())) {
            // the user must be ROLE_ADMIN
            return true;
        }
    }
}
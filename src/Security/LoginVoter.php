<?php
// src/Security/PostVoter.php
namespace App\Security;

use App\Entity\Users;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class LoginVoter extends Voter
{
    // these strings are just invented: you can use anything
    const ACCESS = 'access';
    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::ACCESS))) {
            return false;
        }
        return true;
    }
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        if (!$user instanceof Users) {
            // the user must be logged to deny access
            return true;
        }
    }
}
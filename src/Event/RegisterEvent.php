<?php

namespace App\Event;

use App\Entity\Users;

use Symfony\Component\EventDispatcher\Event;

class RegisterEvent extends Event
{
    const NAME = 'register.completed';
    private $register;
    public function __construct(Users $Users)
    {
        $this->users = $Users;
    }
    public function getUser(): Users
    {
        return $this->users;
    }    
}
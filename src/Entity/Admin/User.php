<?php

namespace App\Entity\Admin;
use App\Entity\User as BaseUser;
use Doctrine\ORM\Mapping\Entity;

#[Entity]
class User extends BaseUser
{
    public function getRoles(): array
    {
       return [
           'ROLE_ADMIN', 'ROLE_MANAGER', 'ROLE_FINANCIAL'
       ];
    }
}
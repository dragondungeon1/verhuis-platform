<?php

namespace App\Entity\Trait;
use App\Entity\Organization;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
trait OrganizationTrait
{
    #[Assert\DisableAutoMapping]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    public ?Organization $organization = null;

    public function getOrganization(): Organization
    {
        return $this->organization;
    }
}
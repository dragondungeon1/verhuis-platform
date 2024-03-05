<?php

declare(strict_types=1);

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

trait CreatedAtTrait
{
    #[Assert\DisableAutoMapping]
    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column]
    public \DateTimeImmutable $createdAt;
}
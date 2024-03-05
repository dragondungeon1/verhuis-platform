<?php

declare(strict_types=1);

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

trait UpdatedAtTrait
{
    #[Assert\DisableAutoMapping]
    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column]
    public \DateTimeImmutable $updatedAt;
}
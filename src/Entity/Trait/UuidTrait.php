<?php

declare(strict_types=1);

namespace App\Entity\Trait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

trait UuidTrait
{
    #[Assert\DisableAutoMapping]
    #[Groups(['firestore:shipment'])]
    #[ORM\Column(type: 'uuid', unique: true)]
    public Uuid $uuid;
}

<?php

namespace App\Entity;

use App\Entity\Trait\IdTrait;
use App\Entity\Trait\UuidTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Category
{
    use IdTrait;
    use UuidTrait;

    #[ORM\Column]
    public string $name;

    #[ORM\OneToOne(targetEntity: RoomItem::class, mappedBy: 'category')]
    public RoomItem $roomItem;
}
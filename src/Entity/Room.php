<?php

namespace App\Entity;

use App\Entity\Trait\IdTrait;
use App\Entity\Trait\UuidTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Room
{
    use IdTrait;
    use UuidTrait;

    #[ORM\ManyToOne(targetEntity: HouseHold::class, inversedBy: 'rooms')]
    public HouseHold $houseHold;

    #[ORM\OneToOne(targetEntity: Category::class, inversedBy: 'roomItem')]
    #[ORM\JoinColumn(onDelete: 'RESTRICT')]
    public Category $category;

    #[ORM\OneToMany(targetEntity: RoomItem::class, mappedBy: 'room', cascade: ['persist'])]
    public Collection $roomItems;

}
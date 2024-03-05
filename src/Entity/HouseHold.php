<?php

namespace App\Entity;

use App\Entity\Trait\IdTrait;
use App\Entity\Trait\UuidTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class HouseHold
{
    use IdTrait;
    use UuidTrait;

    #[ORM\OneToOne(targetEntity: MoveRequest::class, inversedBy: 'houseHold')]
    #[ORM\JoinColumn(onDelete: 'RESTRICT')]
    public MoveRequest $moveRequest;

    #[ORM\OneToMany(targetEntity: Room::class, mappedBy: 'houseHold', cascade: ['persist'])]
    public ?Collection $rooms = null;

    public function __construct()
    {
        $this->rooms = new ArrayCollection();
    }
}
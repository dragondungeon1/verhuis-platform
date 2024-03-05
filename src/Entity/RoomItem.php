<?php

namespace App\Entity;

use App\Entity\Trait\IdTrait;
use App\Entity\Trait\UuidTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class RoomItem
{
    use IdTrait;
    use UuidTrait;

    #[ORM\Column]
    public string $name;

    #[ORM\Column]
    public float $cubicMeters;

    #[ORM\ManyToOne(targetEntity: Room::class, inversedBy: 'roomItems')]
    public Room $room;

    #[ORM\OneToOne(targetEntity: Category::class, inversedBy: 'roomItem')]
    #[ORM\JoinColumn(onDelete: 'RESTRICT')]
    public Category $category;




}
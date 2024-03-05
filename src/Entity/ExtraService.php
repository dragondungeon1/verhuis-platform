<?php

namespace App\Entity;

use App\Entity\Trait\IdTrait;
use App\Entity\Trait\UuidTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class ExtraService
{
    use IdTrait;
    use UuidTrait;

    #[ORM\Column]
    public string $name;

    #[ORM\Column]
    public float $price;

    #[ORM\Column]
    public string $description;

    #[ORM\Column]
    public bool $include = false;

    #[ORM\ManyToMany(targetEntity: MoveRequest::class, inversedBy: 'extraServices')]
    public ?MoveRequest $moveRequest;
}
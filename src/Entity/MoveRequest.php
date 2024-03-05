<?php

namespace App\Entity;

use App\Entity\Trait\IdTrait;
use App\Entity\Trait\UuidTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class MoveRequest
{
    use IdTrait;
    use UuidTrait;

    #[ORM\OneToMany(targetEntity: Address::class, mappedBy: 'moveRequest', cascade: ['persist'])]
    public Collection $addresses;

    #[ORM\Column]
    public bool $clientMoveDateIsFlexible = false;

    #[ORM\Column(type: 'date_immutable')]
    public \DateTimeImmutable $preferedMoveDate;

    #[ORM\Column(type: 'time_immutable')]
    public \DateTimeImmutable $preferredBeginTime;

    #[ORM\OneToOne(targetEntity: HouseHold::class, mappedBy: 'moveRequest', cascade: ['persist'])]
    public HouseHold $houseHold;

    #[ORM\ManyToMany(targetEntity: ExtraService::class, mappedBy: 'moveRequest', cascade: ['persist'])]
    public ?Collection $extraServices = null;

    #[ORM\Column(type: 'text', nullable: true)]
    public ?string $discountCode = null;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->extraServices = new ArrayCollection();
    }


}
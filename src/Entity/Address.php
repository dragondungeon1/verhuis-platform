<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Trait\IdTrait;
use App\Entity\Trait\UuidTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Address
{
    use IdTrait;
    use UuidTrait;

    #[Assert\Length(max: 50, maxMessage: 'Straat mag maximaal uit {{ limit }} tekens bestaan')]
    #[ORM\Column(length: 50, nullable: true)]
    public ?string $street = null;

    #[Assert\Length(max: 15, maxMessage: 'Huisnummer mag maximaal uit {{ limit }} tekens bestaan')]
    #[ORM\Column(length: 15, nullable: true)]
    public ?string $number = null;

    #[Assert\Length(max: 10, maxMessage: 'Huisnummer toevoeging mag maximaal uit {{ limit }} tekens bestaan')]
    #[ORM\Column(length: 10, nullable: true)]
    public ?string $numberAddition = null;

    #[Assert\Length(max: 15, maxMessage: 'Postcode mag maximaal uit {{ limit }} tekens bestaan')]
    #[ORM\Column(length: 15, nullable: true)]
    public ?string $postcode = null;

    #[Assert\Length(max: 35, maxMessage: 'Stad mag maximaal uit {{ limit }} tekens bestaan')]
    #[ORM\Column(length: 35, nullable: true)]
    public ?string $city = null;

    #[ORM\Column(nullable: true)]
    public ?string $country = null;

    #[ORM\Column(nullable: true)]
    public ?string $addressLine1 = null;

    #[ORM\ManyToOne(targetEntity: MoveRequest::class, inversedBy: 'addresses')]
    public MoveRequest $moveRequest;

    public function mergeAddressLine(): void
    {
        $this->addressLine1 = implode(' ', array_filter([$this->street, $this->number, $this->numberAddition]));
    }
}

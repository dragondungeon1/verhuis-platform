<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class ContactInformation
{
    #[ORM\Column]
    public string $name;

    #[ORM\Column]
    public string $lastname;

    #[ORM\Column]
    public string $infix;

    #[ORM\Column]
    public string $email;

    #[ORM\Column]
    public string $phone;

    #[ORM\Column]
    public bool $isBusiness = false;

    #[ORM\Column]
    public ?string $companyName;

    #[ORM\Column]
    public ?string $nameAccountManager;

    #[ORM\Column]
    public ?string $kvkNumber;

}
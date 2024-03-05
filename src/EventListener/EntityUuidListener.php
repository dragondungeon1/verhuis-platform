<?php

declare(strict_types=1);

namespace App\EventListener;

use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Events;
use Symfony\Component\Uid\Factory\UuidFactory;

#[AsDoctrineListener(event: Events::prePersist)]
class EntityUuidListener
{
    public function __construct(
        private UuidFactory $uuidFactory,
    ) {
    }

    public function prePersist(PrePersistEventArgs $args): void
    {
        $entity = $args->getObject();

        if (property_exists($entity, 'uuid') && empty($entity->uuid)) {
            $entity->uuid = $this->uuidFactory->create();
        }
    }
}

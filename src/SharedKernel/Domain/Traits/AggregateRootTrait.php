<?php

namespace SharedKernel\Domain\Traits;

use SharedKernel\Domain\DomainEvent;

/**
 * Trait AggregateRootTrait
 * @package SharedKernel\Domain
 */
trait AggregateRootTrait
{
    use DomainObjectTrait;
    /**
     * @var DomainEvent[]
     */
    private array $domainEvents = [];

    /**
     * @param DomainEvent $domainEvent
     * @throws \Exception
     */
    public function recordDomainEvent(DomainEvent $domainEvent) {
        if (!$domainEvent->getDateTime()) {
            $domainEvent->setDomainEventDateTime(new \DateTimeImmutable());
        }
        $this->domainEvents[] = $domainEvent;
    }

    /**
     * @return DomainEvent[]
     */
    public function getRegisteredDomainEvents(): array
    {
        return $this->domainEvents;
    }
}
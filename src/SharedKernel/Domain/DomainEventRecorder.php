<?php

namespace SharedKernel\Domain;

/**
 * Interface DomainEventRecorder
 * @package SharedKernel\Domain
 */
interface DomainEventRecorder
{
    /**
     * @param DomainEvent $domainEvent
     */
    public function recordDomainEvent(DomainEvent $domainEvent);

    /**
     * @return DomainEvent[]
     */
    public function getRegisteredDomainEvents(): array;
}
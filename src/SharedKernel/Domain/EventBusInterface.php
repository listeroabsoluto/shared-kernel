<?php

namespace SharedKernel\Domain;

/**
 * Interface EventBusInterface
 * @package SharedKernel\Application
 */
interface EventBusInterface
{
    /**
     * @param DomainEvent $domainEvent
     */
    public function handle(DomainEvent $domainEvent): void;

    /**
     * @param DomainEventRecorder $domainEventRecorder
     * @return void
     * @todo segregar, podría ser invocado desde flush o desde otro lugar (no hace falta persistir en db para procesarlos)
     */
    public function dispatchDomainEvents(DomainEventRecorder $domainEventRecorder): void;
}
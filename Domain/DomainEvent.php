<?php

namespace SharedKernel\Domain;
/**
 * Interface DomainEvent
 * @package SharedKernel\Domain
 */
interface DomainEvent extends DomainObject
{
    /**
     * @param \DateTimeImmutable $dateTime
     */
    public function setDomainEventDateTime(\DateTimeImmutable $dateTime);

    /**
     * @return \DateTimeImmutable
     */
    public function getDateTime(): ?\DateTimeImmutable;
}
<?php

namespace SharedKernel\Domain\Traits;

/**
 * Trait DomainEventTrait
 * @package SharedKernel\Domain
 */
trait DomainEventTrait
{
    use DomainObjectTrait;

    /**
     * @var
     */
    private $domainEventDateTime;

    /**
     * @param \DateTimeImmutable $dateTime
     */
    public function setDomainEventDateTime(\DateTimeImmutable $dateTime)
    {
        $this->domainEventDateTime = $dateTime;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateTime(): ?\DateTimeImmutable
    {
        return $this->domainEventDateTime;
    }
}
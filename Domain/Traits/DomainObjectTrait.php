<?php

namespace SharedKernel\Domain\Traits;

use SharedKernel\Domain\DomainObject;

/**
 * Trait DomainObjectTrait
 * @package SharedKernel\Domain
 */
trait DomainObjectTrait
{
    /**
     * @param DomainObject $domainObject
     * @return bool
     */
    public function isEqualsTo(DomainObject $domainObject): bool
    {
        return $this->getHashCode() === $domainObject->getHashCode();
    }

    /**
     * @return string
     */
    public function getHashCode(): string
    {
        return hash('md5', serialize($this));
    }
}
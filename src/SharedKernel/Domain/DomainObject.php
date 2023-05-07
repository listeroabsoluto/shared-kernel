<?php

namespace SharedKernel\Domain;

/**
 * Interface DomainObject
 * @package SharedKernel\Domain
 */
interface DomainObject
{
    /**
     * @param DomainObject $domainObject
     * @return bool
     */
    public function isEqualsTo(DomainObject $domainObject): bool;

    /**
     * @return string
     */
    public function getHashCode(): string;
}
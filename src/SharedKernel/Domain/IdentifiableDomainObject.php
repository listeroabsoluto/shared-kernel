<?php

namespace SharedKernel\Domain;

/**
 * Interface IdentifiableDomainObject
 * @package SharedKernel\Domain
 */
interface IdentifiableDomainObject extends DomainObject
{
    /**
     * @return mixed
     */
    public function getId(): mixed;
}
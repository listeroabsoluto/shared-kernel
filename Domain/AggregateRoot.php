<?php

namespace SharedKernel\Domain;

/**
 * Interface AggregateRoot
 * @package SharedKernel\Domain
 */
interface AggregateRoot extends Entity, DomainEventRecorder
{

}
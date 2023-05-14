<?php

namespace SharedKernel\Domain\Traits;

use PHPUnit\Framework\TestCase;
use SharedKernel\Domain\DomainEvent;

/**
 *
 */
class AggregateRootTraitTest extends TestCase
{

    public function testGetRegisteredDomainEvents()
    {
        $domainEvent = new AggregateRootDummyEvent();
        $subject = new Subject();
        $subject->recordDomainEvent($domainEvent);

        static::assertCount(1, $subject->getRegisteredDomainEvents());
    }
}

/**
 *
 */
class AggregateRootDummyEvent implements DomainEvent {
    use DomainEventTrait;
}

/**
 *
 */
class Subject {
    use AggregateRootTrait;
}

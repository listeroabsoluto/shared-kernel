<?php

namespace SharedKernel\Domain\Traits;

use PHPUnit\Framework\TestCase;
use SharedKernel\Domain\DomainEvent;

/**
 *
 */
class DomainEventTraitTest extends TestCase
{

    public function testDomainEvent()
    {
        $datetime = new \DateTimeImmutable();
        $domainEvent = new DummyDomainEvent();
        $domainEvent->setDomainEventDateTime($datetime);
        static::assertEquals($datetime, $domainEvent->getDateTime());
    }
}


/**
 *
 */
class DummyDomainEvent implements DomainEvent {
    use DomainEventTrait;
}

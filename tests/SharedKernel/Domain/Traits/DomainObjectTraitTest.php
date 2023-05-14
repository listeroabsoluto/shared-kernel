<?php

namespace SharedKernel\Domain\Traits;

use PHPUnit\Framework\TestCase;
use SharedKernel\Domain\DomainEvent;
use SharedKernel\Domain\DomainObject;

/**
 *
 */
class DomainObjectTraitTest extends TestCase
{

    public function testDomainEvent()
    {
        $domainEvent = new DummyDomainObject();
        static::assertNotNull($domainEvent->getHashCode());
        static::assertTrue($domainEvent->isEqualsTo(new DummyDomainObject()));
    }
}


/**
 *
 */
class DummyDomainObject implements DomainObject {
    use DomainObjectTrait;
}

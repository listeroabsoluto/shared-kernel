<?php

namespace SharedKernel\Domain\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class MaritalStatusTest extends TestCase
{


    public function testGetStatus()
    {
        $widower = MaritalStatus::Widower;
        static::assertEquals(MaritalStatus::Widower->value, $widower->getStatus());
    }

}

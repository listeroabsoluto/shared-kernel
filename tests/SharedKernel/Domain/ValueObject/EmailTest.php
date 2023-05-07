<?php

namespace SharedKernel\Domain\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 * Class EmailTest
 * @package App\Domain\ValueObject
 */
class EmailTest extends TestCase
{

    public function testNullWillThrowAnException()
    {
        $this->expectException(\TypeError::class);
        Email::fromAddress(null);
    }

    public function testInvalidAddressThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        Email::fromAddress("invalid.address");
    }

    public function testEmptyAddressThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        Email::fromAddress("");
    }

    public function testValidAddressWillBeCreated()
    {
        $expected = "user@domain.net";
        $actual = Email::fromAddress($expected);

        static::assertEquals($expected, $actual->getAddress());
    }

    public function testToString()
    {
        $expected = "user@domain.net";
        $actual = Email::fromAddress($expected);

        static::assertEquals($expected, (string)$actual);
    }
}

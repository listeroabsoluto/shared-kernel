<?php

namespace SharedKernel\Domain\ValueObject;

use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{

    public function testConstructWithNullWillThrowAnException()
    {
        $this->expectException(\TypeError::class);
        new Url(null);
    }

    public function testConstructWithInvalidUriWillThrowAnException()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Url("invalid.address");
    }

    public function testConstructWithIncompleteUriWillBeCreated()
    {
        $this->expectException(\InvalidArgumentException::class);
        $actual = new Url("domain.net");
    }

    public function testConstructWithValidUriWillBeCreated()
    {
        $expected = "http://domain.net";
        $actual = new Url($expected);

        static::assertEquals($expected, $actual->getUri());
    }
}

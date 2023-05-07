<?php

namespace SharedKernel\Domain\ValueObject;

use PHPUnit\Framework\TestCase;

class PersonNameTest extends TestCase
{

    public function singleProvider(): array
    {
        return [
            ['', '', '', ''],
            [' ', '', '', ''],
            ['a', 'a', '', 'a'],
            [' a ', 'a', '', 'a'],
            ['a b', 'a', 'b', 'a b'],
            ['a b c', 'a b', 'c', 'a b c'],
            ['a b c d', 'a b', 'c d', 'a b c d'],
            ['a b c d e', 'a b', 'c d e', 'a b c d e'],
            ['a b c d e f', 'a b', 'c d e f', 'a b c d e f'],
            ['a b c d e f g', 'a b', 'c d e f g', 'a b c d e f g'],
            ['a b c d e f g h', 'a b', 'c d e f g h', 'a b c d e f g h'],
            ['a b c d e f g h i', 'a b', 'c d e f g h i', 'a b c d e f g h i'],
        ];
    }

    /**
     * @param $single
     * @param $firstName
     * @param $lastName
     * @param $fullName
     * @dataProvider singleProvider
     */
    public function testFromSingle($single, $firstName, $lastName, $fullName)
    {
        $actual = PersonName::fromSingle($single);
        static::assertEquals($firstName, $actual->getFirstName(), 'First name');
        static::assertEquals($lastName, $actual->getLastName(), 'Last name');
        static::assertEquals($fullName, $actual->getFullName(), 'Full name');
    }

    public function testConstructWithNullReturnsAnEmptyFullName()
    {
        $actual = new PersonName(null, null);
        static::assertEmpty($actual->getFullName());
    }

    public function testConstructWithFirstNameReturnsThatAsFullName()
    {
        $firstName = "Jhon";
        $lastName = null;
        $actual = new PersonName($firstName, $lastName);
        static::assertEquals($firstName, $actual->getFirstName());
        static::assertSame("", $actual->getLastName());
        static::assertEquals($firstName, $actual->getFullName());
    }

    public function testConstructWithLastNameReturnsThatAsFullName()
    {
        $firstName = null;
        $lastName = "Doe";
        $actual = new PersonName($firstName, $lastName);
        static::assertSame("", $actual->getFirstName());
        static::assertEquals($lastName, $actual->getLastName());
        static::assertEquals($lastName, $actual->getFullName());
    }

    public function testConstructWithFirstAndLastNameReturnsThatAsFullName()
    {
        $firstName = "John";
        $lastName = "Doe";
        $actual = new PersonName($firstName, $lastName);
        static::assertEquals($firstName, $actual->getFirstName());
        static::assertEquals($lastName, $actual->getLastName());
        static::assertEquals("John Doe", $actual->getFullName());
    }

    public function testCapitalizeIncompleteName()
    {
        $single = "john";
        $actual = PersonName::fromSingle($single, true);
        static::assertEquals('John', $actual->getFirstName());
        static::assertEquals('', $actual->getLastName());
        static::assertEquals("John", $actual->getFullName());
    }

    public function testCapitalizeCompleteName()
    {
        $single = "john doe";
        $actual = PersonName::fromSingle($single, true);
        static::assertEquals('John', $actual->getFirstName());
        static::assertEquals('Doe', $actual->getLastName());
        static::assertEquals("John Doe", $actual->getFullName());
    }

    public function testToString()
    {
        $firstName = "John";
        $lastName = "Doe";
        $actual = new PersonName($firstName, $lastName);
        static::assertEquals("John Doe", (string)$actual);
    }
}

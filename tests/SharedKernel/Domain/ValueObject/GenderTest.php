<?php

namespace SharedKernel\Domain\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class GenderTest extends TestCase
{
    public function testGetName()
    {
        $genderMale = Gender::Male;
        $genderFemale = Gender::from('female');
        $genderOther = Gender::tryFrom('other');

        static::assertEquals(Gender::Male->value, $genderMale->getName());
        static::assertEquals(Gender::Female->value, $genderFemale->getName());
        static::assertEquals(Gender::Other->value, $genderOther->getName());
    }
}

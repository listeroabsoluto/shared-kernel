<?php

namespace SharedKernel\Domain\ValueObject;

/**
 * Class Gender
 * @package Account\Domain\ValueObject
 */
enum Gender: string
{
    case Male = 'male';
    case Female = 'female';
    case Other = 'other';

    public function getName(): string
    {
        return $this->value;
    }
}
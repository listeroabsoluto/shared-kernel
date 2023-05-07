<?php

namespace SharedKernel\Domain\ValueObject;

/**
 * Class MaritalStatus
 * @package Account\Domain\ValueObject
 */
enum MaritalStatus: string
{
    case Single = 'single';
    case Married = 'married';
    case Widower = 'widower';
    case Divorced = 'divorced';

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->value;
    }

}
<?php

namespace SharedKernel\Application\Query\Sort;

/**
 *
 */
readonly class Ordering
{

    public function __construct(private string $field, private SortDirection $direction)
    {
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getDirection(): SortDirection
    {
        return $this->direction;
    }

}
<?php

namespace SharedKernel\Application\Query\Filter;

/**
 *
 */
readonly class Filter
{

    public function __construct(private string $field, private Operator $operator, private string $value)
    {
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getOperator(): Operator
    {
        return $this->operator;
    }

    public function getValue(): string
    {
        return $this->value;
    }

}
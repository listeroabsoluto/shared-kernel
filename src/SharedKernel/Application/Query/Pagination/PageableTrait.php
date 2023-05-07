<?php

namespace SharedKernel\Application\Query\Pagination;

/**
 *
 */
trait PageableTrait
{
    private Pagination $pagination;

    public function getLimit(): int
    {
        return $this->pagination->getLimit();
    }

    public function getOffset(): int
    {
        return $this->pagination->getOffset();
    }
}
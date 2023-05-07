<?php

namespace SharedKernel\Application\Query\Pagination;

/**
 *
 */
interface Pageable
{
    public function getLimit(): int;

    public function getOffset(): int;
}
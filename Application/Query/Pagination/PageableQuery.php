<?php

namespace SharedKernel\Application\Query\Pagination;

/**
 * Class PaginableQuery
 * @package SharedKernel\Application\Query
 */
class PageableQuery implements Pageable
{
    use PageableTrait;

    /**
     * PaginationQuery constructor.
     * @param int $limit
     * @param int $offset
     */
    public function __construct(int $limit, int $offset)
    {
        $this->pagination = new Pagination($limit, $offset);
    }

}
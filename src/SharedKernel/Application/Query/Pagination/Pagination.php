<?php

namespace SharedKernel\Application\Query\Pagination;

/**
 * Class Pagination
 * @package SharedKernel\Application\Query
 */
readonly class Pagination implements Pageable
{
    /**
     * @var integer
     */
    private int $limit;
    /**
     * @var integer
     */
    private int $offset;

    /**
     * PaginationQuery constructor.
     * @param int $limit
     * @param int $offset
     */
    public function __construct(int $limit, int $offset)
    {
        if ($limit < 1) {
            throw new \InvalidArgumentException("Limit value is not valid");
        }

        if ($offset < 0) {
            throw new \InvalidArgumentException("Offset value is not valid");
        }

        $this->limit = $limit;
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

}
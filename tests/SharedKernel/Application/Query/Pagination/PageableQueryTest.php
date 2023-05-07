<?php

namespace SharedKernel\Application\Query\Pagination;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class PageableQueryTest extends TestCase
{

    public function testPageable()
    {
        $pageable = new PageableQuery(10, 0);
        static::assertEquals(10, $pageable->getLimit());
        static::assertEquals(0, $pageable->getOffset());
    }
}

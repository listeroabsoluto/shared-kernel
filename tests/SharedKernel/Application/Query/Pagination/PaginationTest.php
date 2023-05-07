<?php

namespace SharedKernel\Application\Query\Pagination;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class PaginationTest extends TestCase
{

    public function testInvalidLimit()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Limit value is not valid');
        new Pagination(0, 10);
    }

    public function testInvalidOffset()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Offset value is not valid');
        new Pagination(10, -1);
    }

    public function testValidObject()
    {
        $pagination = new Pagination(10, 5);
        static::assertEquals(10, $pagination->getLimit());
        static::assertEquals(5, $pagination->getOffset());
    }

}

<?php

namespace SharedKernel\Application\Query\Sort;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class SortableQueryTest extends TestCase
{
    public function testFromArray()
    {
        $query = SortableQuery::fromArray([
            'title' => 'desc'
        ], [
            'title' => 'blog.title.value',
        ]);

        static::assertEquals([
            new Ordering('blog.title.value', SortDirection::Desc)
        ], $query->get());

        static::assertEquals('blog.title.value', $query->get()[0]->getField());
        static::assertEquals(SortDirection::Desc, $query->get()[0]->getDirection());
    }
}

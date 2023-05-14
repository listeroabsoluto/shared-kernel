<?php

namespace SharedKernel\Application\Query\Filter;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class FilterableQueryTest extends TestCase
{
    public function testFromArray()
    {
        $query = FilterableQuery::fromArray([
            'title{like}' => 'php'
        ], [
            'title' => 'blog.title.value',
        ], [
            'title' => [Operator::Eq, Operator::Like],
        ]);

        static::assertEquals([
            new Filter('blog.title.value', Operator::Like, 'php')
        ], $query->get());

        static::assertEquals('blog.title.value', $query->get()[0]->getField());
        static::assertEquals(Operator::Like, $query->get()[0]->getOperator());
        static::assertEquals('php', $query->get()[0]->getValue());
    }

}

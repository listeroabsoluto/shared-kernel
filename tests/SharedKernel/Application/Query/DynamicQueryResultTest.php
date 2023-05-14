<?php

namespace SharedKernel\Application\Query;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class DynamicQueryResultTest extends TestCase
{

    public function testDecorate()
    {
        $queryResult = DynamicQueryResult::decorate(18.56);
        static::assertEquals(18.56, $queryResult->getResult());
    }
}

<?php

namespace SharedKernel\Application\Query;

/**
 *
 */
interface QueryHandler
{
    public function __invoke(Query $query): QueryResult;
}
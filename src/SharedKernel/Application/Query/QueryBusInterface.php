<?php

namespace SharedKernel\Application\Query;

/**
 *
 */
interface QueryBusInterface
{
    public function handle(Query $query): QueryResult;
}
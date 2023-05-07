<?php

namespace SharedKernel\Application\Query\Filter;

/**
 *
 */
enum Operator: string
{
    case Eq = 'eq';
    case Like = 'like';
}

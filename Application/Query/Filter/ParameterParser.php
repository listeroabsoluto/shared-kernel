<?php

namespace SharedKernel\Application\Query\Filter;

/**
 * Class ParameterParser
 * @package SharedKernel\Application\Query
 */
abstract class ParameterParser
{
    /**
     *
     */
    protected const FIELD_INDEX = 1;
    /**
     *
     */
    protected const OPERATOR_INDEX = 2;

    /**
     * @param string $subject
     * @param array $allowedOperators
     * @return array
     */
    public static function extractFieldAndOperator(string $subject, array $allowedOperators = []): array {
        preg_match('/([^{]+){?([^}]+)?}?/', $subject, $matches);
        $field = $matches[self::FIELD_INDEX];
        $operator = Operator::from($matches[self::OPERATOR_INDEX]);

        if ($allowedOperators && isset($allowedOperators[$field]) && !in_array($operator, $allowedOperators[$field])) {
            throw new \InvalidArgumentException("Operator not allowed");
        }

        return compact('field', 'operator');
    }
}
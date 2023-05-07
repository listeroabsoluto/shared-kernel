<?php

namespace SharedKernel\Application\Query\Filter;

use SharedKernel\Application\Query\ParametersMapper;

/**
 * Class FilterableQuery
 * @package SharedKernel\Application\Query
 */
class FilterableQuery
{
    /**
     * @var array
     */
    private array $filters = [];
    /**
     * @var ParametersMapper
     */
    private ParametersMapper $mapper;

    /**
     * @var array
     */
    private array $allowedOperators;

    /**
     * FilterableQuery constructor.
     * @param ParametersMapper|null $mapper
     * @param array $allowedOperators
     */
    private function __construct(ParametersMapper $mapper = null, array $allowedOperators = [])
    {
        $this->mapper = $mapper;
        $this->allowedOperators = $allowedOperators;
    }

    /**
     * @param array $filters
     * @param array $map
     * @param array $allowedOperators
     * @return FilterableQuery
     */
    public static function fromArray(array $filters, array $map = [], array $allowedOperators = []): FilterableQuery
    {
        $filterableQuery = new FilterableQuery(new ParametersMapper($map), $allowedOperators);
        foreach ($filters as $field => $value) {
            $filterableQuery->add($field, $value);
        }

        return $filterableQuery;
    }

    /**
     * @param $field
     * @param $value
     */
    public function add($field, $value): void
    {
        $result = ParameterParser::extractFieldAndOperator($field, $this->allowedOperators);
        $field = $result['field'];
        $operator = $result['operator'];
        $field = $this->mapper->getMappedField($field);

        $this->filters[] = new Filter($field, $operator, $value);
    }

    /**
     * @return array<Filter>
     */
    public function get(): array
    {
        return $this->filters;
    }

}
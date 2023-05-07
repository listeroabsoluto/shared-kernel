<?php

namespace SharedKernel\Application\Query\Sort;

use SharedKernel\Application\Query\ParametersMapper;

/**
 * Class SortableQuery
 * @package SharedKernel\Application\Query
 */
class SortableQuery
{
    /**
     * @var array
     */
    private array $orderings = [];
    /**
     * @var ?ParametersMapper
     */
    private ?ParametersMapper $mapper;

    /**
     * SortableQuery constructor.
     * @param ParametersMapper $mapper
     */
    private function __construct(ParametersMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @param array $orderings
     * @param array $map
     * @return SortableQuery
     */
    public static function fromArray(array $orderings,  array $map = []): SortableQuery
    {
        $sortable = new SortableQuery(new ParametersMapper($map));
        foreach ($orderings as $field => $direction) {
            $sortable->add($field, SortDirection::from($direction));
        }

        return $sortable;
    }

    /**
     * @param string $field
     * @param SortDirection $direction
     */
    public function add(string $field, SortDirection $direction): void
    {
        $field = $this->mapper->getMappedField($field);

        $this->orderings[] = new Ordering($field, $direction);
    }

    /**
     * @return array<Ordering>
     */
    public function get(): array
    {
        return $this->orderings;
    }
}
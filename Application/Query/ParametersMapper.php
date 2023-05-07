<?php

namespace SharedKernel\Application\Query;

/**
 *
 */
class ParametersMapper
{
    private array $map;

    public function __construct(array $map)
    {
        foreach ($map as $key => $value) {
            if (empty($key)) {
                throw new \InvalidArgumentException('Invalid map key');
            }
            if (empty($value)) {
                throw new \InvalidArgumentException('Invalid map value');
            }
        }
        $this->map = $map;
    }

    public function getMappedField(string $field): string
    {
        if (!isset($this->map[$field])) {
            throw new \InvalidArgumentException('Invalid map field');
        }

        return $this->map[$field];
    }
}
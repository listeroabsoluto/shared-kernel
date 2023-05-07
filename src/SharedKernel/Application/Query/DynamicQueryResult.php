<?php

namespace SharedKernel\Application\Query;

/**
 * class DynamicQueryResult
 * @package SharedKernel\Application
 */
final class DynamicQueryResult implements QueryResult
{
    /**
     * @var \Closure
     */
    private \Closure $closure;

    /**
     * DynamicQueryResult constructor.
     * @param \Closure $closure
     */
    public function __construct(\Closure $closure)
    {
        $this->closure = $closure;
    }

    /**
     * @param $result
     * @return DynamicQueryResult
     */
    public static function decorate($result = null): DynamicQueryResult
    {
        return new self(
            function () use ($result) {
                return $result;
            }
        );
    }

    /**
     * @return mixed
     */
    public function getResult(): mixed
    {
        $closure = $this->closure;

        return $closure();
    }
}
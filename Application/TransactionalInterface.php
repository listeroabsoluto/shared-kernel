<?php

namespace SharedKernel\Application;

/**
 * Interface TransactionalInterface
 * @package SharedKernel\Application
 */
interface TransactionalInterface
{
    /**
     * @param \Closure $closure
     * @return mixed
     */
    public function execute(\Closure $closure): mixed;
}
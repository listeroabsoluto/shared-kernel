<?php

namespace SharedKernel\Application\Command;

/**
 * Interface CommandBusInterface
 * @package SharedKernel\Application
 */
interface CommandBusInterface
{
    /**
     * @param Command $command
     */
    public function handle(Command $command): void;
}
<?php

namespace SharedKernel\Application\Command;

/**
 * Interface CommandHandler
 * @package SharedKernel\Application
 */
interface CommandHandler
{
    /**
     * @param Command $command
     */
    public function __invoke(Command $command): void;
}
<?php

namespace SharedKernel\Application;

use SharedKernel\Application\Command\Command;
use SharedKernel\Domain\EventBusInterface;

/**
 * Class NewArticleHandler
 * @package Blog\Application\CommandHandler
 */
class TransactionalDecorator
{
    protected TransactionalHandler $inner;

    public function __construct(
        readonly private TransactionalInterface $transactional,
        readonly private EventBusInterface $eventBus,
        TransactionalHandler $inner
    ) {
        if (!is_callable($inner)) {
            throw new \LogicException('Invalid inner');
        }

        $this->inner = $inner;
    }

    /**
     * @param Command $command
     */
    public function __invoke(Command $command): void
    {
        $method = $this->inner;
        $closure = function () use ($command, $method) {
            return $method->__invoke($command);
        };

        $entity = $this->transactional->execute($closure);
        $this->eventBus->dispatchDomainEvents($entity);
    }

}
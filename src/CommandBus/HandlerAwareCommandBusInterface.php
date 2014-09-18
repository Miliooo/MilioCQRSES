<?php

namespace Milio\CQRS\CommandBus;

use Milio\CQRS\Command\CommandInterface;

/**
 * A command bus which knows how to call the commandHandler
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
interface HandlerAwareCommandBusInterface
{
    public function dispatch(CommandInterface $command);
}

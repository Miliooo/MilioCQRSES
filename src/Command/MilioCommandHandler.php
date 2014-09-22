<?php

namespace Milio\CQRS\Command;

use Broadway\CommandHandling\CommandHandler;

/**
 * MilioCommandHandler
 *
 * This name makes it easier to find the command handler, it's hard to call it more specific.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
abstract class MilioCommandHandler extends CommandHandler
{
    /**
     * {@inheritDoc}
     */
    public function handle($command)
    {
        $method = $this->getHandleMethod($command);
        if (!method_exists($this, $method)) {
            throw new \Exception(sprintf('Command %s has no handle method', get_class($command)));
        }
        $this->$method($command);
    }

    private function getHandleMethod($command)
    {
        $classParts = explode('\\', get_class($command));

        return 'handle' . end($classParts);
    }
}

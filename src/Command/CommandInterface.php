<?php

namespace Milio\CQRS\Command;

/**
 * Interface CommandInterface
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
interface CommandInterface
{
    /**
     * A command has one command handler.
     *
     * Commands which use the same command handler should return the same type.
     * This is easily achievable by letting commands extend an abstract class.
     *
     * The purpose of this requirement is being able to find the right command handler giving a type.
     *
     * @return string
     */
    public function getType();
}

<?php

namespace Milio\CQRS\Identifier;

use Broadway\UuidGenerator\Rfc4122\Version4Generator;

/**
 * The abstract aggregate identifier.
 * Value objects which has to deal with identifiers have to extend this.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
abstract class AggregateIdentifier
{
    protected $identifier;

    /**
     * @param string $identifier
     */
    final public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Generates a new instance of the identifier
     *
     * @return static
     */
    final public static function generate()
    {
        $generator = new Version4Generator();

        return new static ($generator->generate());
    }

    /**
     * @return string
     */
    final public function getIdentifierString()
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    final public function __toString()
    {
        return $this->identifier;
    }
}

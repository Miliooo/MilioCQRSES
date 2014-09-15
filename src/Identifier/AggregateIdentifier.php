<?php

namespace Milio\CQRS\Identifier;

use Broadway\UuidGenerator\Rfc4122\Version4Generator;

abstract class AggregateIdentifier
{
    protected $identifier;

    final public function __construct($identifier)
    {
        $this->identifier = $identifier;
    }

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

    final public function __toString()
    {
        return $this->identifier;
    }
}

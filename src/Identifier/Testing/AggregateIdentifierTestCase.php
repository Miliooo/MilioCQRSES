<?php

namespace Milio\CQRS\Identifier\Testing;

use Milio\CQRS\Identifier\AggregateIdentifier;

abstract class AggregateIdentifierTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testInterface()
    {
        $this->assertInstanceOf('Milio\CQRS\Identifier\AggregateIdentifier', $this->getAggregate());
    }
    /**
     * @return AggregateIdentifier
     */
    abstract public function getAggregate();
}

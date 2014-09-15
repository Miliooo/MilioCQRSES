<?php

namespace Milio\CQRS\Identifier;

use Milio\CQRS\Identifier\Testing\AggregateIdentifierTestCase;

class AggregateIdentifierTest extends AggregateIdentifierTestCase
{
    /**
     * @test
     */
    public function generate_returns_an_object()
    {
        $test = TestIdentifier::generate();
        $this->assertInstanceof('Milio\CQRS\Identifier\TestIdentifier', $test);
    }

    /**
     * @test
     */
    public function the_length_is_36()
    {
        $test = TestIdentifier::generate();
        $this->assertEquals(36, strlen($test->getIdentifierString()));
    }


    /**
     * @test
     */
    public function it_supports_returning_as_string()
    {
        $test = TestIdentifier::generate();

        $string = (string) $test;
        $this->assertTrue(is_string($string));
    }


    /**
     * @test
     */
    public function it_takes_a_string_as_constructor_argument()
    {
        $test = new TestIdentifier('foo');
        $this->assertInstanceof('Milio\CQRS\Identifier\TestIdentifier', $test);
        $this->assertEquals('foo', (string) $test);
        $this->assertEquals('foo', $test->getIdentifierString());
    }

    /**
     * @return AggregateIdentifier
     */
    public function getAggregate()
    {
        return new TestIdentifier('foo');
    }
}

class TestIdentifier extends AggregateIdentifier
{
}

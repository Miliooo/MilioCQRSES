<?php

namespace Milio\CQRS\tests\ReadModel\InMemory;

use Broadway\ReadModel\RepositoryInterface;
use Milio\CQRS\ReadModel\InMemory\MilioInMemoryRepository;

class MilioInMemoryRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|RepositoryInterface
     */
    private $child;

    /**
     * @var MilioInMemoryRepository
     */
    private $repository;

    const IDENTIFIER = 'foo_bar_identifier';

    public function setup()
    {
        $this->child = $this->getMock('Broadway\ReadModel\RepositoryInterface');
        $this->repository = new MilioInMemoryRepository($this->child);
    }

    /**
     * @test
     * @expectedException \Milio\CQRS\ReadModel\Exception\NotFoundReadModelException
     */
    public function find_or_fail_throws_exception_when_no_result()
    {
        $this->child->expects($this->once())->method('find')
            ->with(self::IDENTIFIER)
            ->will($this->returnValue(null));

        $this->repository->findOrFail(self::IDENTIFIER);
    }

    /**
     * @test
     */
    public function find_or_fail_throws_no_exception_when_result()
    {
        $readModel = $this->getMock('Broadway\ReadModel\ReadModelInterface');

        $this->child->expects($this->once())->method('find')
            ->with(self::IDENTIFIER)
            ->will($this->returnValue($readModel));

        $this->assertEquals($readModel, $this->repository->findOrFail(self::IDENTIFIER));
    }
}

<?php

namespace Milio\CQRS\ReadModel\Testing;

use Broadway\ReadModel\InMemory\InMemoryRepository;
use Broadway\ReadModel\Projector;
use Broadway\ReadModel\Testing\Scenario;
use Milio\CQRS\ReadModel\InMemory\MilioInMemoryRepository;
use PHPUnit_Framework_TestCase as TestCase;

abstract class MilioProjectorScenarioTestCase extends TestCase
{
    /**
     * @var Scenario
     */
    protected $scenario;

    public function setUp()
    {
        $this->scenario = $this->createScenario();
    }

    /**
     * @return Scenario
     */
    protected function createScenario()
    {
        $repository = new MilioInMemoryRepository(new InMemoryRepository());

        return new Scenario($this, $repository, $this->createProjector($repository));
    }

    /**
     * @param MilioInMemoryRepository $repository
     *
     * @return Projector
     */
    abstract protected function createProjector(MilioInMemoryRepository $repository);
}

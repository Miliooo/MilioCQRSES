<?php

namespace Milio\CQRS\EventSourcing;

use Broadway\EventSourcing\EventSourcingRepository as BroadwayEventSourcingRepository;
use Broadway\EventStore\EventStoreInterface;
use Broadway\EventHandling\EventBusInterface;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;

/**
 * Event sourcing repository which uses the public constructor.
 */
class EventSourcingRepository extends BroadwayEventSourcingRepository
{
    public function __construct(EventStoreInterface $eventStore, EventBusInterface $eventBus, $aggregateClass)
    {
        $aggregateFactory = new PublicConstructorAggregateFactory();
        parent::__construct($eventStore, $eventBus, $aggregateClass, $aggregateFactory, []);
    }
}

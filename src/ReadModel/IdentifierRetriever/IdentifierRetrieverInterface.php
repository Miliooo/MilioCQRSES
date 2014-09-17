<?php

namespace Milio\CQRS\ReadModel\IdentifierRetriever;

/**
 * When only having to query for an aggregate identifier the read model repository interface doesn't really fit
 * our use case.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
interface IdentifierRetrieverInterface
{
        public function find($identifier);
}

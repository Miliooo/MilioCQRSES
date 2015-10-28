<?php

namespace Milio\CQRS\ReadModel;

use Broadway\ReadModel\ReadModelInterface;
use Broadway\ReadModel\RepositoryInterface;

interface ReadModelRepositoryInterface extends RepositoryInterface
{
    /**
     * Finds a single read model by a set of criteria.
     *
     * @param array $fields
     *
     * @return ReadModelInterface|null
     */
    public function findOneBy(array $fields);
}

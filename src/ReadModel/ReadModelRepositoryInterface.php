<?php

namespace Milio\CQRS\ReadModel;

use Broadway\ReadModel\ReadModelInterface;
use Broadway\ReadModel\RepositoryInterface;
use Milio\CQRS\ReadModel\ErrorHandling\NotFoundReadModelException;

interface ReadModelRepositoryInterface extends RepositoryInterface
{
    /**
     * @param $id
     * @return ReadModelInterface
     *
     * @throws NotFoundReadModelException when read model was not found
     */
    public function findOrFail($id);

    /**
     * Finds a single read model by a set of criteria.
     *
     * @param array $fields
     *
     * @return ReadModelInterface|null
     */
    public function findOneBy(array $fields);

    public function findByCriteria(array $criteria, array $orderBy = null, $limit = null, $offset = null);
}

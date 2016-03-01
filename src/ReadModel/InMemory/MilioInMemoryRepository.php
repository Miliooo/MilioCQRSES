<?php

namespace Milio\CQRS\ReadModel\InMemory;

use Broadway\ReadModel\ReadModelInterface;
use Broadway\ReadModel\RepositoryInterface;
use Milio\CQRS\ReadModel\Exceptions\NotFoundReadModelException;
use Milio\CQRS\ReadModel\ReadModelRepositoryInterface;

class MilioInMemoryRepository implements ReadModelRepositoryInterface
{
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function findOrFail($id)
    {
        $result = $this->repository->find($id);

        if (null == $result) {
            throw new NotFoundReadModelException();
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function findOneBy(array $fields)
    {
        $result = $this->repository->findBy($fields);

        if (empty($result)) {
            return null;
        }

        return $result[0];
    }

    public function save(ReadModelInterface $data)
    {
        return $this->repository->save($data);
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function findBy(array $fields)
    {
        return $this->repository->findBy($fields);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * {@inheritdoc}
     */
    public function remove($id)
    {
        return $this->repository->remove($id);
    }

    /**
     * This is not supported, since the read model projectors should not use this.
     *
     * It's used when outputting read models in the backend. Maybe it should be part of another interface.
     */
    public function findByCriteria(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return new \InvalidArgumentException('in memory repository does not implement this');
    }
}

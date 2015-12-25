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
     * @param $id
     * @return ReadModelInterface
     *
     * @throws NotFoundReadModelException when read model was not found
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
     * Finds a single read model by a set of criteria.
     *
     * @param array $fields
     *
     * @return ReadModelInterface|null
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
     * @param string $id
     *
     * @return ReadModelInterface|null
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param array $fields
     *
     * @return ReadModelInterface[]
     */
    public function findBy(array $fields)
    {
        return $this->repository->findBy($fields);
    }

    /**
     * @return ReadModelInterface[]
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @param string $id
     */
    public function remove($id)
    {
        return $this->repository->remove($id);
    }
}

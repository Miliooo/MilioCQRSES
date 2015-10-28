<?php

namespace Milio\CQRS\ReadModel\DoctrineORM;

use Broadway\ReadModel\ReadModelInterface;
use Doctrine\ORM\EntityManagerInterface;
use Milio\CQRS\ReadModel\ReadModelRepositoryInterface;

/**
 * Repository implementation using DoctrineORM.
 */
class DoctrineORMRepository implements ReadModelRepositoryInterface
{
    private $entityManager;
    private $repository;
    private $identifierName;

    /**
     * @param EntityManagerInterface $entityManager  An entity manager instance
     * @param string                 $class          FQCN of the class managed by doctrine
     * @param string                 $identifierName Name of your identifier (eg id, userId)
     */
    public function __construct(EntityManagerInterface $entityManager, $class, $identifierName)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository($class);
        $this->identifierName = $identifierName;
    }

    /**
     * {@inheritDoc}
     */
    public function save(ReadModelInterface $data, $flush=true)
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush($data);
    }

    /**
     * {@inheritDoc}
     */
    public function find($id)
    {
        return $this->repository->findOneBy(array($this->identifierName => $id));
    }

    /**
     * {@inheritDoc}
     */
    public function findBy(array $fields)
    {
        return $this->repository->findBy($fields);
    }

    public function findOneBy(array $fields)
    {
        return $this->repository->findOneBy($fields);
    }

    /**
     * {@inheritDoc}
     */
    public function findAll()
    {
        return $this->repository->findAll();
    }

    /**
     * {@inheritDoc}
     */
    public function remove($id)
    {
        $model = $this->find($id);
        if ($model === null) {
            return;
        }
        $this->entityManager->remove($model);
        $this->entityManager->flush($model);
    }
}

<?php

namespace Milio\CQRS\ReadModel\DoctrineORM;

use Broadway\ReadModel\ReadModelInterface;
use Broadway\ReadModel\RepositoryInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class DoctrineORMRepository
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class DoctrineORMRepository implements RepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $aggregateId;

    /**
     * @param EntityManagerInterface $entityManager
     * @param string                 $class
     * @param string                 $aggregateId
     */
    public function __construct(EntityManagerInterface $entityManager, $class, $aggregateId)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository($class);
    }

    /**
     * {@inheritdoc}
     */
    public function save(ReadModelInterface $data)
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return $this->repository->findOneBy([$this->aggregateId => $id]);
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
        $data = $this->find($id);
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }
}

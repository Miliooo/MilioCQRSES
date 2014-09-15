<?php

namespace Milio\CQRS\ReadModel\DoctrineORM;

use Broadway\ReadModel\RepositoryFactoryInterface;
use Broadway\ReadModel\RepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class DoctrineORMRepositoryFactory
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class DoctrineORMRepositoryFactory implements RepositoryFactoryInterface
{
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $name  name of your unique id field. (example 'id' or 'userId')
     * @param string $class FQCN of the model as managed by doctrine
     *
     * @return RepositoryInterface
     */
    public function create($name, $class)
    {
        return new DoctrineORMRepository($this->entityManager, $class, $name);
    }
}

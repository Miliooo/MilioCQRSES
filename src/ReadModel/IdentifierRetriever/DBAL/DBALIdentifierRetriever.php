<?php

namespace Milio\CQRS\ReadModel\IdentifierRetriever\DBAL;

use Doctrine\DBAL\Connection;
use Milio\CQRS\ReadModel\IdentifierRetriever\IdentifierRetrieverInterface;

class DBALIdentifierRetriever implements IdentifierRetrieverInterface
{
    private $connection;
    private $tableName;
    private $identifier;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection, $tableName, $identifier)
    {
        $this->connection = $connection;
        $this->tableName = $tableName;
        $this->identifier = $identifier;
    }

    public function find($identifier)
    {
        //$conn->fetchAssoc('SELECT * FROM user WHERE username = ?', array('jwage'));
        $query = "SELECT * FROM ".$this->tableName." WHERE ".$this->identifier." = ?";
        $model = $this->connection->fetchAssoc($query, [$identifier]);

        return $model;
    }
}

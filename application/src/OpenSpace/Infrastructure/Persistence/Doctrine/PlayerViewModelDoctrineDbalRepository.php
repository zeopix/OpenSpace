<?php

namespace OpenSpace\Infrastructure\Persistence\Doctrine;

use OpenSpace\Query\Repository\PlayerViewModelRepositoryInterface;
use OpenSpace\Query\ViewModel\PlayerViewModel;
use OpenSpace\Query\ViewModel\PlayerViewModelCollection;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Schema\Schema;

class PlayerViewModelDoctrineDbalRepository implements PlayerViewModelRepositoryInterface
{
    protected $connection;
    protected $tableName;

    /**
     * Constructor
     *
     * @param Connection $connection
     * @param string     $tableName
     */
    public function __construct(Connection $connection, $tableName = 'players_views')
    {
        $this->connection = $connection;
        $this->tableName = $tableName;
    }

    /**
     * {@inheritDoc}
     */
    public function save(PlayerViewModel $taskViewModel)
    {
        $data = $taskViewModel->toArray();

        $this->connection->insert($this->tableName, $data);
    }

    /**
     * {@inheritDoc}
     */
    public function getByPlayerId($id)
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getList($offset, $limit)
    {
        $rows = $this->connection->fetchAll(sprintf(
            'SELECT * FROM %s LIMIT %d, %d', $this->tableName, $offset, $limit));

        if (!$rows) {
            return null;
        }

        $collection = new PlayerViewModelCollection(array(), $offset, $limit, count($rows));
        foreach($rows as $row) {
            $collection->add(new PlayerViewModel(array(
                'id' => $row['id'],
                'username' => $row['username'],
                'email' => $row['email'],
            )));
        }

        return $collection;
    }


    /**
     * Creates task view model table in the database
     */
    public function createTable()
    {
        $schema = new Schema();
        $table = $schema->createTable($this->tableName);
        $table->addColumn('id', 'string', array('length' => 64, 'nullable' => false, 'unique' => true));
        $table->addColumn('username', 'string', array('length' => 255, 'nullable' => false));
        $table->addColumn('email', 'string', array('length' => 255, 'nullable' => false));
        $table->setPrimaryKey(array('id'));

        foreach ($schema->toSql($this->connection->getDatabasePlatform()) as $sql) {
            $this->connection->exec($sql);
        }
    }
}
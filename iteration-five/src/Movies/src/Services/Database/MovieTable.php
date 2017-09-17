<?php

namespace Movies\Services\Database;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Exception\InvalidArgumentException;

/**
 * Class MovieTable
 * @package Movies\TableGateway
 */
class MovieTable
{
    /**
     * @var TableGateway
     */
    protected $tableGateway;

    /**
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    /**
     * Retrieve all cmovies
     *
     * @throws InvalidArgumentException
     * @return bool|ResultSet
     */
    public function fetchAll()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->columns(
            [
                "title",
                "director",
                "release_date",
                "stars",
                "synopsis",
                "genre"
            ]
        )->order('title ASC');

        return  $this->tableGateway->selectWith($select);
    }
}

<?php

namespace Application\Model;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

/**
 * Class ModelBase
 * @package Application\Model
 */
class ModelBase extends TableGateway
{
    /**
     * ModelBase constructor.
     * @param AdapterInterface $adapter
     * @param string $table
     */
    public function __construct(AdapterInterface $adapter, $table)
    {
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new \ArrayObject());

        parent::__construct($table, $adapter);
    }

    public function getEntity()
    {
        return $this->getResultSetPrototype()->getArrayObjectPrototype();
    }

    public function setEntity($entity)
    {
        $this->getResultSetPrototype()->setArrayObjectPrototype($entity);
    }
}

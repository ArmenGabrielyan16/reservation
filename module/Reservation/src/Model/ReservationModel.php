<?php

namespace Reservation\Model;

use Application\Model\ModelBase;
use Reservation\Entity\Hall;
use Reservation\Entity\Reserve;
use Reservation\Service\ReservationService;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Select;

/**
 * Class Reservation
 * @package Reservation\Model
 */
class ReservationModel extends ModelBase
{
    /**
     * ReservationModel constructor.
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        parent::__construct($adapter, 'reserves');
    }

    /**
     * @param int $movieID
     * @return Reserve[]
     */
    public function getReservesByMovieID($movieID)
    {
        $this->setEntity(new Reserve());

        $select = new Select();
        $select->from($this->getTable());
        $select->columns([
            'id',
            'movie_id',
            'row',
            'seat',
            'inactive'
        ]);

        $select->where->equalTo($this->getTable() . '.movie_id', $movieID);

        $select->order(['row' => Select::ORDER_ASCENDING]);
        $select->order(['seat' => Select::ORDER_ASCENDING]);

        $result = $this->executeSelect($select);

        return $result;
    }

    /**
     * @param int $hallID
     * @return Hall
     */
    public function getHallByID($hallID)
    {
        $this->setEntity(new Hall());

        $select = new Select();
        $select->from('halls');
        $select->columns([
            'id',
            'rows',
            'seats_in_row',
        ]);

        $select->where->equalTo('halls.id', $hallID);

        $result = $this->executeSelect($select);

        return $result->current();
    }

    /**
     * @param int $hallID
     * @param int $movieID
     * @param int $row
     * @param int $seat
     * @return Reserve
     */
    public function getReserve($hallID, $movieID, $row, $seat)
    {
        $this->setEntity(new Reserve());

        $select = new Select();
        $select->from($this->getTable());
        $select->columns([
            'id',
            'hall_id',
            'movie_id',
            'row',
            'inactive',
        ]);

        $select->where->equalTo($this->getTable() . '.hall_id', $hallID);
        $select->where->equalTo($this->getTable() . '.movie_id', $movieID);
        $select->where->equalTo($this->getTable() . '.row', $row);
        $select->where->equalTo($this->getTable() . '.seat', $seat);
        $select->where->equalTo($this->getTable() . '.inactive', ReservationService::ACTIVE);

        $result = $this->executeSelect($select);

        return $result->current();
    }
}

<?php

namespace Reservation\Entity;

use Application\Entity\EntityBase;

/**
 * Class Hall
 * @package Reservation\Entity
 */
class Hall extends EntityBase
{
    /**
     * @var int
     */
    protected $rows;

    /**
     * @var int
     */
    protected $seatsInRow;

    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->rows  = isset($data['rows'])  ? $data['rows']  : null;
        $this->seatsInRow = isset($data['seats_in_row']) ? $data['seats_in_row'] : null;
    }

    /**
     * @return int
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @return int
     */
    public function getSeatsInRow()
    {
        return $this->seatsInRow;
    }
}
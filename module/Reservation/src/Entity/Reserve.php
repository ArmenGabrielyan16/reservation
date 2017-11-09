<?php

namespace Reservation\Entity;

use Application\Entity\EntityBase;

/**
 * Class Reserve
 * @package Reservation\Entity
 */
class Reserve extends EntityBase
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $hallID;

    /**
     * @var int
     */
    protected $movieID;

    /**
     * @var int
     */
    protected $row;

    /**
     * @var int
     */
    protected $seat;

    /**
     * @var int
     */
    protected $inactive;

    /**
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id       = isset($data['id'])       ? $data['id']       : null;
        $this->hallID   = isset($data['hall_id'])  ? $data['hall_id']  : null;
        $this->movieID  = isset($data['movie_id']) ? $data['movie_id'] : null;
        $this->row      = isset($data['row'])      ? $data['row']      : null;
        $this->seat     = isset($data['seat'])     ? $data['seat']     : null;
        $this->inactive = isset($data['inactive']) ? $data['inactive'] : null;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getHallID()
    {
        return $this->hallID;
    }

    /**
     * @return int
     */
    public function getMovieID()
    {
        return $this->movieID;
    }

    /**
     * @return int
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @return int
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @return int
     */
    public function getInactive()
    {
        return $this->inactive;
    }
}
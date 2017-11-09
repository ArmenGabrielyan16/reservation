<?php

namespace Reservation\Service;

use Application\Service\ServiceBase;
use Reservation\Model\ReservationModel;

/**
 * Class ReservationService
 * @package Application\Service
 */
class ReservationService extends ServiceBase
{
    const INACTIVE = 1;
    const ACTIVE = 0;

    /**
     * @param array $data
     */
    public function createReserve($data)
    {
        if ($data['seat'] && $data['row']) {
            /** @var ReservationModel $model */
            $model = $this->container->get(ReservationModel::class);

            $model->delete(
                [
                    'inactive' => self::INACTIVE
                ]
            );

            $insertData['seat'] = $data['seat'];
            $insertData['row'] = $data['row'];
            $insertData['movie_id'] = $data['movie_id'];
            $insertData['hall_id'] = $data['hall_id'];
            $insertData['inactive'] = self::ACTIVE;


            $model->insert($insertData);
        }
    }

    public function updateReserve($reserveID)
    {
        /** @var ReservationModel $model */
        $model = $this->container->get(ReservationModel::class);
        $model->update(
            [
                'inactive' => self::INACTIVE
            ],
            [
                'id' => $reserveID
            ]
        );

    }

    /**
     * @param int $hallID
     * @param int $movieID
     * @param int $row
     * @param int $seat
     * @return bool
     */
    public function isReserved($hallID, $movieID, $row, $seat)
    {
        /** @var ReservationModel $model */
        $model = $this->container->get(ReservationModel::class);

        if ($model->getReserve($hallID, $movieID, $row, $seat)) {
            return true;
        }

        return false;
    }
}

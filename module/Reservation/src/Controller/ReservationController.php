<?php

namespace Reservation\Controller;

use Application\Controller\IndexController;
use Interop\Container\ContainerInterface;
use Reservation\Model\ReservationModel;
use Reservation\Service\ReservationService;
use Zend\Http\Request;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class ReservationController
 * @package Application\Controller
 */
class ReservationController extends IndexController
{
    /**
     * ReservationController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
    }

    public function indexAction()
    {
        $hallID = $this->params()->fromRoute('hall_id');
        $movieID = $this->params()->fromRoute('movie_id');

        /** @var Request $request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $request->getPost()->toArray();

            $rowSeat = explode('-', $data['row_seat']);
            $data['row'] = $rowSeat[0];
            $data['seat'] = $rowSeat[1];
            $data['movie_id'] = $movieID;
            $data['hall_id'] = $hallID;

            $reserveID = isset($data['reserve_id']) ? $data['reserve_id'] : null;

            /** @var ReservationService $service */
            $service = $this->container->get(ReservationService::class);

            if ($service->isReserved($hallID, $movieID, $data['row'], $data['seat'])) {
                $service->updateReserve($reserveID);
            } else {
                $service->createReserve($data);
            }
        }

        /** @var ReservationModel $model */
        $model = $this->container->get(ReservationModel::class);
        $hall = $model->getHallByID($hallID);
        $reserves = $model->getReservesByMovieID($movieID);

        return new ViewModel([
            'hall' => $hall,
            'reserves' => iterator_to_array($reserves),
            'hallID' => $hallID,
            'movieID' => $movieID,
        ]);
    }

    /**
     * @return JsonModel
     */
    public function updateAction()
    {
        $movieID = $this->params()->fromRoute('movie_id');

        /** @var ReservationModel $model */
        $model = $this->container->get(ReservationModel::class);
        $reserves = $model->getReservesByMovieID($movieID);

        $reservesArray = [];
        foreach ($reserves as $reserve) {
            $reservesArray[] = [
                'id' => $reserve->getId(),
                'row' => $reserve->getRow(),
                'seat' => $reserve->getSeat(),
                'inactive' => $reserve->getInactive(),
            ];
        }

        return new JsonModel($reservesArray);
    }
}

<?php

namespace Reservation;

use Zend\Db\Adapter\AdapterInterface;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
          'factories' => [
//              Form\AddChatRoomForm::class => function() {
//                  return new Form\AddChatRoomForm();
//              },
//              Form\Filter\AddChatRoomInputFilter::class => function($container) {
//                  $dbAdapter = $container->get(Adapter::class);
//                  return new Form\Filter\AddChatRoomInputFilter($dbAdapter);
//              },
              Model\ReservationModel::class => function($container) {
                  $dbAdapter = $container->get(AdapterInterface::class);
                  return new Model\ReservationModel($dbAdapter);
              },
              Service\ReservationService::class => function($container) {
                  $chatRoomService = new Service\ReservationService();
                  $chatRoomService->setContainer($container);

                  return $chatRoomService;
              },
//              Service\ChatRoomFile::class => function($container) {
//                  $chatRoomFile = new Service\ChatRoomFile();
//                  $chatRoomFile->setContainer($container);
//
//                  return $chatRoomFile;
//              },
          ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\ReservationController::class => function($container) {
                    return new Controller\ReservationController($container);
                },
            ]
        ];
    }
}

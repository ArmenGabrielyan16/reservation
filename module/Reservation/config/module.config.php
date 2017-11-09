<?php

namespace Reservation;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/reserve/[:hall_id]/[:movie_id]',
                    'defaults' => [
                        'controller' => Controller\ReservationController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'hall_id' => '[0-9]+',
                        'movie_id' => '[0-9]+',
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'update' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'    => '/update',
                            'defaults' => [
                                'controller' => Controller\ReservationController::class,
                                'action'     => 'update',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];

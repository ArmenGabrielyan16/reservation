<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;

abstract class ServiceBase
{
    /** @var  ContainerInterface */
    protected $container;

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    public function setContainer($container)
    {
        $this->container = $container;
    }
}

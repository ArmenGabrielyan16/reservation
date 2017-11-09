<?php

namespace Application\Entity;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class EntityBase
 * @package Application\Entity
 */
abstract class EntityBase implements ArraySerializableInterface
{
    public function exchangeArray(array $array)
    {

    }

    public function getArrayCopy()
    {

    }
}

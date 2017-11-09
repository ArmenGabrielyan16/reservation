<?php

namespace Application\Form;

use Zend\Form\Form;

class FormBase extends Form
{
    public function __construct($name)
    {
        parent::__construct($name);

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => $name . '_csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600
                )
            )
        ));
    }
}

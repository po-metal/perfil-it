<?php

namespace PI\Form;

use Zend\Form\Form;
use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import

class CvPicture extends Form {

    public function __construct() {
        parent::__construct('CvPicture');
        $this->setAttribute('id', 'CvPicture');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', "form-horizontal");
        $this->setAttribute('role', "form");
       

        $this->add(array(
            'type' => 'Zend\Form\Element\File',
            'name' => 'picture',
            'options' => array(
                'label' => '',
                'placeholder' => 'La imagen a subir debe tener formato JPG o PNG con una resolución máxima de 640x640'
            ),
            'attributes' => array(
                'id' => 'btnpicture',
                'class' => 'btn btn-default fa fa-upload',

                )
        ));

    }


    public function InputFilter() {

        $inputFilter = new InputFilter();
        $factory = new InputFactory();



        return $inputFilter;
    }

}

<?php

namespace Application\Form;

use Zend\Form\Form,
    Doctrine\Common\Persistence\ObjectManager,
    DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator,
    Zend\Form\Annotation\AnnotationBuilder;
use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import

class CvPersonalInformation extends Form {

    public function __construct() {
        // we want to ignore the name passed
        parent::__construct('CvPersonalInformation');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', "form-horizontal");
        $this->setAttribute('role', "form");
        $this->setAttribute('action', "javascript:cv.savePersonalInformation()");

        
       
        $this->add(array(
            'name' => 'name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => true,
                'class' => "form-control",
            ),
            'options' => array(
                'label' => 'Nombre',
            )
        ));

        $this->add(array(
            'name' => 'lastname',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => true,
                'class' => "form-control",
            ),
            'options' => array(
                'label' => 'Apellido',
            )
        ));
        
        
        
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => true,
                'class' => "form-control",
            ),
            'options' => array(
                'label' => 'Email',
            )
        ));
        
           $this->add(array(
            'name' => 'birthdate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'required' => true,
                'class' => "form-control",
            ),
            'options' => array(
                'label' => 'Birthdate',
            )
        ));



        $this->addSubmitAndCsrf();
    }

    protected function addSubmitAndCsrf() {
        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf'
        ));

        $this->add(array(
            'type' => 'Button',
            'name' => 'submit',
            // 'type' => 'Zend\Form\Element\Button',
            'options' => array(
                'label' => '',
            ),
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn btn-primary cdicmfasave',
            )
        ));
    }

    public function InputFilter() {

        $inputFilter = new InputFilter();
        $factory = new InputFactory();


        $inputFilter->add($factory->createInput(array(
                    'name' => 'name',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'min' => 1,
                                'max' => 50,
                            ),
                        ),
                    ),
        )));
        
          $inputFilter->add($factory->createInput(array(
                    'name' => 'lastname',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'min' => 1,
                                'max' => 50,
                            ),
                        ),
                    ),
        )));



        return $inputFilter;
    }

}

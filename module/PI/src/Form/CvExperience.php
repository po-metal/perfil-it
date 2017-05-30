<?php

namespace Application\Form;

use Zend\Form\Form,
    Doctrine\Common\Persistence\ObjectManager,
    DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator,
    Zend\Form\Annotation\AnnotationBuilder;
use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import

class CvExperience extends Form {

    public function __construct($entityManager) {
        // we want to ignore the name passed
        parent::__construct('CvExperience');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', "form-horizontal");
        $this->setAttribute('role', "form");
        $this->setAttribute('action', "javascript:cv.saveExperience()");



        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden'
        ));


        $this->add(array(
            'name' => 'title',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => true,
                'class' => "form-control",
            ),
            'options' => array(
                'label' => 'Titulo',
            )
        ));

        $this->add(array(
            'name' => 'company',
            'type' => 'Zend\Form\Element\Hidden',
            'attributes' => array(
                'required' => false,
                'class' => "form-control",
            ),
        ));

        $this->add(array(
            'name' => 'companyFinder',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => true,
                'class' => "form-control",
                "id" => "companyFinder"
            ),
            'options' => array(
                'label' => 'Compania',
            )
        ));

        $this->add(array(
            'name' => 'job',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'required' => false,
                "class" => "form-control",
                'id' => 'job',
            ),
            'options' => array(
                'object_manager' => $entityManager,
                'target_class' => 'Pi\Entity\Job',
                'property' => 'name',
                'display_empty_item' => true,
                'empty_item_label' => '---',
                'label' => "Rol/Job",
                'description' => 'Selecciona el rol mas cercano a la posición.',
                'is_method' => false,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
        ));


        $this->add(array(
            'name' => 'jobPosition',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'required' => false,
                "class" => "form-control",
                'id' => 'job',
            ),
            'options' => array(
                'object_manager' => $entityManager,
                'target_class' => 'Pi\Entity\JobPosition',
                'property' => 'name',
                'display_empty_item' => true,
                'empty_item_label' => '---',
                'label' => "Jerarquia",
                'description' => 'Selecciona la jerarquia del puesto',
                'is_method' => false,
            ),
        ));

        $this->add(array(
            'name' => 'start',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'required' => true,
                'class' => "form-control",
            ),
            'options' => array(
                'label' => 'Desde',
                'description' => 'Indica la fecha de inicio de esta posición',
            )
        ));

        $this->add(array(
            'name' => 'end',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'required' => true,
                'class' => "form-control",
            ),
            'options' => array(
                'label' => 'Hasta',
                'description' => 'Indica la fecha de fin de esta posición',
            )
        ));



        $this->add(array(
            'name' => 'description',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'required' => false,
                'class' => "form-control",
            ),
            'options' => array(
                'label' => 'Descripcion Breve',
                'description' => 'Brinda una breve descripción del puesto y tus tareas',
            )
        ));


        $this->addSubmitAndCsrf();
    }

    protected function addSubmitAndCsrf() {
//        $this->add(array(
//            'type' => 'Zend\Form\Element\Csrf',
//            'name' => 'csrf'
//        ));

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
                    'name' => 'description',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'min' => 0,
                                'max' => 150,
                            ),
                        ),
                    ),
        )));





        return $inputFilter;
    }

}

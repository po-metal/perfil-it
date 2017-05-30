<?php

namespace PI\Form\InputFilter;

use Zend\InputFilter\InputFilter;

/**
 * Description of RecoverFilter
 *
 * @author Cristian Incarnato <cristian.cdi@gmail.com>
 */
class CvPicture extends InputFilter {

    function __construct($path) {

        $this->add([
            'name' => 'picture',
            'required' => true,
            'filters' => array(
                array('name' => \ZfMetal\Security\Filter\RenameUpload::class,
                    "options" =>
                    [
                        "target" => $path,
                        "randomize" => true,
                        "use_upload_extension" => true,
                    //"use_upload_name" => true,
                    //"overwrite" => true
                    ]
                ),
            ),
            'validators' => [
                [
                    'name' => '\Zend\Validator\File\Size',
                    'options' => [
                        'max' => 500000000
                    ]
                ],
                [
                    'name' => '\Zend\Validator\File\ImageSize',
                    'options' => [
                        'minWidth' => 100,
                        'minHeight' => 100,
                        'maxWidth' => 1640,
                        'maxHeight' => 1640,
                    ]
                ],
                [
                    'name' => '\Zend\Validator\File\Extension',
                    'options' => [
                        'extension' => ['jpg', 'png']
                    ]
                ],
            ],
        ]);
    }

}

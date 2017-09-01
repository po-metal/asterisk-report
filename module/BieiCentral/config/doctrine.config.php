<?php

namespace BieiCentral;

return [
    'doctrine' => [
        'driver' => array(
            __NAMESPACE__ => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/Entity'
            ),
            'orm_asterisk' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__
                )
            )
        )
    ]
];

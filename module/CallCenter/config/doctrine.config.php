<?php

namespace CallCenter;

return [
    'doctrine' => [
        'driver' => array(
            __NAMESPACE__ => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/Entity'
            ),
        )
    ]
];

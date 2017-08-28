<?php

return [
    'zfc_rbac' => [
        'guest_role' => 'invitado',
        'guards' => [
            'ZfcRbac\Guard\RouteGuard' => [
                'BieiCentral*' => ['admin','usuario'],
                 'Cdr*' => ['admin','usuario'],
                 'CallCenter*' => ['admin','usuario'],
                //'home' => ['admin','usuario'],
            ]
        ],
    ]
];

<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Users\Controller\Users' => 'Users\Controller\UsersController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'users' => __DIR__ . '/../view',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'users' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => 'users[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                ),
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'users' => __DIR__ . '/../view',
        )
    )
);

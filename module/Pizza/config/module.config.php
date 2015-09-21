<?php

return array(
    'controllers' => array(
                'invokables' => array('Pizza\Controller\Pizza' => 'Pizza\Controller\PizzaController'),
    ),
    'router'      => array(
                'routes' => array(
                        'pizza' => array(
                               'type'    => 'segment',
                               'options' => array(
                                        'route'         => '/pizza[/:action][/:id]',
                                        'constraints'   => array(
                                                       'action'     => '[a-zA-z][a-zA-z0-9_-]*',
                                                       'id'         => '[0-9]+',
                                                       'defaults'   => array(
                                                             'controller' => 'Pizza\Controller\Pizza',
                                                             'action'     => 'index',
                                                       ),
                                        ),
                               ),
                        ),
                ),
    ),
    'view_manager' => array(
                  'template_path_stack' => array(
                                       'pizza' => __DIR__ . '/../view/',
                  ),
    ),
);
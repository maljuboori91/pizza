<?php 
return array(
    'service_manager' => array(
        'invokables' => array(
            'Images\Service\PostServiceInterface' => 'Images\Service\PostService'
        )
    ),
   'view_manager' => array(
         'template_path_stack' => array(
             __DIR__ . '/../view',
         ),
     ),
    'controllers' => array(
         'factories' => array(
             'Images\Controller\List' => 'Images\Factory\ListControllerFactory'
         )
     ),
    'router' => array(
         // Open configuration for all possible routes
         'routes' => array(
             // Define a new route called "post"
             'post' => array(
                 // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                 'type' => 'literal',
                 // Configure the route itself
                 'options' => array(
                     // Listen to "/blog" as uri
                     'route'    => '/images',
                     // Define default controller and action to be called when this route is matched
                     'defaults' => array(
                         'controller' => 'Images\Controller\List',
                         'action'     => 'index',
                     )
                 )
             )
         )
     )
 );
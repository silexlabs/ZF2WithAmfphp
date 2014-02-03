<?php
  return array(
    'controllers' => array(
      'factories' => array(
        'Service\Controller\Amf' => 'Service\Controller\AmfControllerFactory',
      ),
    ),
    'router' => array(
      'routes' => array(
        'home' => array(
          'type' => 'Literal',
          'options' => array(
            'route'    => '/',
            'defaults' => array(
              'controller' => 'Service\Controller\Amf',
              'action'     => 'server',
            ),
          ),
        ),
      ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);

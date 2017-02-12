<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'CriztianiX/Cremilla',
    ['path' => '/cremilla'],
    function (RouteBuilder $routes) {
        $routes->connect('/logs', [
            'controller' => 'Logs', 'action' => 'index', 'plugin' => 'CriztianiX/Cremilla' 
        ]);
        $routes->connect('/workers', [
            'controller' => 'Workers', 'action' => 'index', 'plugin' => 'CriztianiX/Cremilla'
        ]);
    }
);

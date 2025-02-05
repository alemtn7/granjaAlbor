<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get(from:'/', to: 'Home::index');
$routes->get(from:'roles', to: 'rolController::index');



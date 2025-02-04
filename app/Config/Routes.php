<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get(from:'/', to: 'Home::index');
$routes->get(from:'home', to: 'Home::index');
$routes->get(from:'home/getUsers', to: 'Home::getUsers');
$routes->get(from:'home/create', to: 'Home::create');
$routes->post(from:'home/create', to: 'Home::create');

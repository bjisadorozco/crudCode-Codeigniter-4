<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Crud::index');
$routes->get('/obtenerNombre/(:any)', 'Crud::obtenerNombre/$1'); // recibe un parametro
$routes->post('/crear', 'Crud::crear');
$routes->get('/eliminar/(:any)', 'Crud::eliminar/$1');
$routes->post('/actualizar', 'Crud::actualizar');

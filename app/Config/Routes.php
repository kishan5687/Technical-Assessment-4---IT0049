<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'TaskController::index');
$routes->get('/', 'TaskController::index');
$routes->get('tasks', 'TaskController::index');

$routes->get('login', 'AuthController::login');
$routes->post('login/auth', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout');

$routes->get('tasks/new', 'TaskController::new');
$routes->post('tasks/create', 'TaskController::create');
$routes->get('tasks/edit/(:num)', 'TaskController::edit/$1');
$routes->post('tasks/update/(:num)', 'TaskController::update/$1');
$routes->get('tasks/delete/(:num)', 'TaskController::delete/$1');

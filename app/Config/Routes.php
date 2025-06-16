<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PageController::home');
$routes->get('/about', 'PageController::about');
$routes->get('/login', 'Auth::login');
$routes->post('/do-login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/test', 'PageController::test');

$routes->group('profile', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Profile::index');
    $routes->get('create', 'Profile::create');
    $routes->post('store', 'Profile::store');
    $routes->get('edit/(:num)', 'Profile::edit/$1');
    $routes->post('update/(:num)', 'Profile::update/$1');
    $routes->get('delete/(:num)', 'Profile::delete/$1');
});

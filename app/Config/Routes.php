<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home/coba', 'Home::coba');
$routes->get('/coba', 'Coba::index');
$routes->get('/coba/tes/(:any)/(:num)', 'Coba::tes/$1/$2');
$routes->get('/coba/profil/(:any)', 'Coba::profil/$1');

$routes->get('/user', 'Admin\User::index');


$routes->add('/function', function () {
    echo "ini function";
});

$routes->get('/pages', 'Pages::index');
$routes->get('/pages/about', 'Pages::about');
$routes->get('/pages/contact', 'Pages::contact');

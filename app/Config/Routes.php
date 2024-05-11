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

$routes->get('/anime', 'Anime::index');
$routes->get('/anime/detail/(:any)', 'Anime::detail/$1');
$routes->get('/anime/edit/(:any)', 'Anime::edit/$1');
$routes->get('/anime/create', 'Anime::create');
$routes->post('/anime/save', 'Anime::save');
$routes->post('/anime/update/(:num)', 'Anime::update/$1');
// $routes->get('/anime/hapus', 'Anime::hapus');
$routes->delete('/anime/(:num)', 'Anime::hapus/$1');

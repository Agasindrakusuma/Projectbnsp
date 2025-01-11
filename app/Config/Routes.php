<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// $routes->get('/admin', 'Admin::index');
// $routes->post('/admin/add', 'Admin::add');
// $routes->post('/admin/edit/(:num)', 'Admin::edit/$1'); // POST untuk Edit
// $routes->get('/admin/hapus/(:num)', 'Admin::delete/$1');


$routes->get('/', 'Home::index');

$routes->get('dashboard', 'Dashboard::index');

// Rute Admin
$routes->get('/admin', 'Admin::index');
$routes->post('/admin/add', 'Admin::add');
$routes->post('/admin/edit/(:num)', 'Admin::edit/$1');
$routes->get('/admin/delete/(:num)', 'Admin::delete/$1'); // Ubah dari 'hapus' menjadi 'delete'
$routes->post('/search', 'Admin::search');


$routes->get('kategori', 'Kategori::index');
$routes->post('kategori/add', 'Kategori::add');
$routes->post('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->get('kategori/delete/(:num)', 'Kategori::delete/$1');

$routes->get('kategori', 'Kategori::index');
$routes->get('kategori/chartData', 'Kategori::chartData');


// $routes->get('/admin', 'admin::index');
// $routes->post('/admin', 'admin::index');
// $routes->post('/admin/add', 'admin::add');
// $routes->get('/admin/edit/(:num)', 'admin::edit/$1');
// $routes->get('/admin/hapus/(:num)', 'admin::hapus/$1');
// $routes->post('/admin/update', 'admin::update');

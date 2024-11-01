<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// route admin login

// $routes->get('login','Admin\LoginController::index');
// $routes->post('login/authenticate', 'Admin\LoginController::authenticate');

// route admin dashboard
// $routes->get('dashboard', 'Admin\DashboardController::index');
$routes->get('template', 'Admin\DashboardController::template');

$routes->get('login', 'Admin\LoginController::index');
$routes->post('login/authenticate', 'Admin\LoginController::authenticate');
$routes->get('dashboard', 'Admin\DashboardController::index');


// CRUD Pasien
$routes->get('users-list', 'Admin\PasienController::index');
$routes->get('user-form', 'Admin\PasienController::create');
$routes->post('submit-form', 'Admin\PasienController::store');
$routes->get('edit-view/(:num)', 'Admin\PasienController::singleUser/$1');
$routes->post('update', 'Admin\PasienController::update');
$routes->get('delete/(:num)', 'Admin\PasienController::delete/$1');

// CRUD Obat
$routes->get('obat-list', 'Admin\ObatController::index');
$routes->get('obat-form', 'Admin\ObatController::create');
$routes->post('submit-obat-form', 'Admin\ObatController::store');
$routes->get('edit-obat-view/(:segment)', 'Admin\ObatController::singleObat/$1');
$routes->post('update-obat', 'Admin\ObatController::update');
$routes->get('delete-obat/(:segment)', 'Admin\ObatController::delete/$1');

// Kelola AKun
$routes->get('pengguna', 'Admin\PenggunaController::index');

// CRUD Pengguna
$routes->get('akun-list', 'Admin\PenggunaController::index');
$routes->get('akun-form', 'Admin\PenggunaController::create');
$routes->post('submit-user-form', 'Admin\PenggunaController::store');
$routes->get('edit-user-view/(:segment)', 'Admin\PenggunaController::singleUser/$1');
$routes->post('update-user', 'Admin\PenggunaController::update');
$routes->get('delete-user/(:segment)', 'Admin\PenggunaController::delete/$1');


// CRUD Rekam Medis

$routes->resource('Admin/RekamMedisController', ['controller' => 'Admin\Home']);
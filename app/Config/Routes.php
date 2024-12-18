<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('template', 'Admin\DashboardController::template');
$routes->get('dashboard', 'Admin\DashboardController::index');

// API Routes
//Users
$routes->match(['get', 'post'], 'register', 'UsersController::register');
$routes->match(['get', 'post'], '/', 'UsersController::login');
$routes->get('user-profile/(:any)', 'UsersController::user/$1');

//Obat
$routes->get('obat-list', 'ObatController::index');
$routes->get('obat-form', 'ObatController::create');
$routes->post('submit-obat-form', 'ObatController::create');
$routes->get('edit-obat-view/(:segment)', 'ObatController::edit/$1');
$routes->post('update-obat', 'ObatController::update/$1');
$routes->get('delete-obat/(:segment)', 'ObatController::delete/$1');

//Pasien
$routes->get('users-list', 'PasienController::index');
$routes->get('user-form', 'PasienController::create');
$routes->post('submit-form', 'PasienController::create');
$routes->get('edit-view/(:any)', 'PasienController::edit/$1');
$routes->post('update', 'PasienController::update/$1');
$routes->get('delete/(:any)', 'PasienController::delete/$1');

// route admin login
// $routes->get('login','Admin\LoginController::index');
// $routes->post('login/authenticate', 'Admin\LoginController::authenticate');

// route admin dashboard
// $routes->get('dashboard', 'Admin\DashboardController::index');
$routes->get('template', 'Admin\DashboardController::template');
$routes->get('login', 'Admin\LoginController::index');
$routes->post('login/authenticate', 'Admin\LoginController::authenticate');
$routes->get('dashboard', 'Admin\DashboardController::index');
$routes->get('logout', 'Admin\LoginController::logout');

// CRUD Pasien
// $routes->get('users-list', 'Admin\PasienController::index');
// $routes->get('user-form', 'Admin\PasienController::create');
// $routes->post('submit-form', 'Admin\PasienController::store');
// $routes->get('edit-view/(:any)', 'Admin\PasienController::singleUser/$1');
// $routes->post('update', 'Admin\PasienController::update');
// $routes->get('delete/(:any)', 'Admin\PasienController::delete/$1');

// CRUD Obat
// $routes->get('obat-list', 'Admin\ObatController::index');
// $routes->get('obat-form', 'Admin\ObatController::create');
// $routes->post('submit-obat-form', 'Admin\ObatController::store');
// $routes->get('edit-obat-view/(:segment)', 'Admin\ObatController::singleObat/$1');
// $routes->post('update-obat', 'Admin\ObatController::update');
// $routes->get('delete-obat/(:segment)', 'Admin\ObatController::delete/$1');

// Kelola AKun
// $routes->get('pengguna', 'Admin\PenggunaController::index');

// CRUD Pengguna
// $routes->get('akun-list', 'Admin\PenggunaController::index');
// $routes->get('akun-form', 'Admin\PenggunaController::create');
// $routes->post('submit-user-form', 'Admin\PenggunaController::store');
// $routes->get('edit-user-view/(:segment)', 'Admin\PenggunaController::singleUser/$1');
// $routes->post('update-user', 'Admin\PenggunaController::update');
// $routes->get('delete-user/(:segment)', 'Admin\PenggunaController::delete/$1');


// CRUD Rekam Medis
// $routes->get('rekammedis-list', 'Admin\RekamMedisController::index');
// $routes->get('rekam_medis-form', 'Admin\RekamMedisController::create');
// $routes->post('submit-rekam_medis-form', 'Admin\RekamMedisController::store');
// $routes->get('edit-rekammedis-view/(:segment)', 'Admin\RekamMedisController::singleObat/$1');
// $routes->post('update-rekam_medis', 'Admin\RekamMedisController::update');
// $routes->get('delete-rekam_medis/(:segment)', 'Admin\RekamMedisController::delete/$1');

//CRUD Transaksi
$routes->get('transaksi-list', 'Admin\TransaksiController::index'); 
$routes->get('transaksi-form', 'Admin\TransaksiController::create');
$routes->post('submit-transaksi-form', 'Admin\RekamMedisController::store');


// Laporan Keuangan
// $routes->get('pendapatan', 'Admin\LaporanController::index');
$routes->get('/pendapatan', 'Admin\LaporanPemasukanController::index');
$routes->post('/laporan-pemasukan/fetch', 'Admin\LaporanPemasukanController::fetchData');

// $routes->get('pengeluaran', 'Admin\LaporanController::pengeluaran');
$routes->get('/pengeluaran', 'Admin\LaporanPengeluaranController::index');
$routes->post('/laporan-pengeluaran/fetch', 'Admin\LaporanPengeluaranController::fetchData');



$routes->get('user-list', 'Admin\UserController::index');
$routes->get('user-add-form', 'Admin\UserController::create');
$routes->post('user-store', 'Admin\UserController::store');
$routes->get('user-edit/(:any)', 'Admin\UserController::singleUser/$1');
$routes->post('user-update', 'Admin\UserController::update');
$routes->get('user-delete/(:any)', 'Admin\UserController::delete/$1');
$routes->get('user-profile/(:any)', 'Admin\UserController::profile/$1'); // Menambahkan rute untuk menampilkan profil pengguna

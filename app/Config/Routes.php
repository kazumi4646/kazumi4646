<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Auth page
$routes->get('/login', 'Auth::login');

// Main page
$routes->get('/', 'Home::index');
$routes->get('/activity', 'Home::activity');
//about
$routes->get('/information', 'Home::information');
$routes->get('/pressrelease', 'Home::pressrelease');
$routes->get('/history', 'Home::history');
$routes->get('/activity', 'Home::activity');

// Blog page
$routes->get('/blog', 'Blog::index');

// Shop page
$routes->get('/shop', 'Shop::index');
$routes->get('/shop/product', 'Shop::detail');

// Admin page
$routes->get('/dashboard', 'Admin::index');
$routes->resource('products');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

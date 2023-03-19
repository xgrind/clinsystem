<?php

namespace Config;

use App\Controllers\ConvenioController;
use App\Controllers\EspecialidadeController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


// Convênio
$routes->group('convenios', function($routes) {
    $routes->get('/', [ConvenioController::class, 'index']);
});

$routes->group('convenio', function($routes) {
    $routes->match(['post', 'get'], '/', [ConvenioController::class, 'novo']);
    $routes->match(['post', 'get'], '(:num)/editar', [ConvenioController::class, 'editar']);
    $routes->get('(:num)/excluir', [ConvenioController::class, 'excluir']);
});

// Especialidade
$routes->group('especialidades', function($routes) {
    $routes->get('/', [EspecialidadeController::class, 'index']);
});

$routes->group('especialidade', function($routes) {
    $routes->match(['post', 'get'], '/', [EspecialidadeController::class, 'novo']);
    $routes->match(['post', 'get'], '(:num)/editar', [EspecialidadeController::class, 'editar']);
    $routes->get('(:num)/excluir', [EspecialidadeController::class, 'excluir']);
});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

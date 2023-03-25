<?php

namespace Config;

use App\Controllers\ConvenioController;
use App\Controllers\DashboardController;
use App\Controllers\DicaController;
use App\Controllers\EspecialidadeController;
use App\Controllers\LoginController;
use App\Controllers\MedicoController;
use App\Controllers\PessoaContatoController;
use App\Controllers\PessoaController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('DashboardController');
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
$routes->get('/', [DashboardController::class, 'index']);


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

// Dica
$routes->group('dicas', function($routes) {
    $routes->get('/', [DicaController::class, 'index']);
});

$routes->group('dica', function($routes) {
    $routes->match(['post', 'get'], '/', [DicaController::class, 'novo']);
    $routes->match(['post', 'get'], '(:num)/editar', [DicaController::class, 'editar']);
    $routes->get('(:num)/excluir', [DicaController::class, 'excluir']);
    $routes->get('(:num)', [DicaController::class, 'visualizar']);
});

// Login
$routes->match(['post', 'get'], 'login', [LoginController::class, 'entrar']);

// Usuário
$routes->group('usuarios', function($routes) {
    $routes->get('/', [PessoaController::class, 'index']);
});

// $routes->addRedirect('usuario', 'usuario/pac');

$routes->group('usuario', function($routes) {
    // $routes->match(['post', 'get'], '/', [PessoaController::class, 'novo']);
    $routes->get('/', [PessoaController::class, 'novo']);
    $routes->match(['post', 'get'], '(:segment)', [PessoaController::class, 'novo']);    
    $routes->match(['post', 'get'], '(:num)/editar', [PessoaController::class, 'editar']);
    $routes->get('(:num)', [PessoaController::class, 'visualizar']);
    $routes->get('(:num)/excluir', [PessoaController::class, 'excluir']);
    $routes->get('(:num)/contatos', [PessoaContatoController::class, 'index']);
    $routes->match(['post', 'get'], '(:num)/contato', [PessoaContatoController::class, 'novo']);
    $routes->match(['post', 'get'], '(:num)/contato/(:num)/editar', [PessoaContatoController::class, 'editar']);
    $routes->get('(:num)/contato/(:num)/excluir', [PessoaContatoController::class, 'excluir']);
});

// $routes->group('medicos', function($routes) {
//     $routes->get('/', [MedicoController::class, 'index']);
// });
// $routes->group('medico', function($routes) {
//     $routes->match(['post', 'get'], '/', [MedicoController::class, 'novo']);
// });

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

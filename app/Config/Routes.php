<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('admin', static function($routes){

  $routes->group('',['filter'=>'cifilter:auth'], static function($routes){
    // $routes->view('example-page','example-page');
    $routes->get('home','AdminController::index',['as'=>'admin.home']);
    $routes->get('logout','AdminController::logoutHandler',['as'=>'admin.logout']);
  });

  $routes->group('',['filter'=>'cifilter:guest'], static function($routes){
    // $routes->view('example-auth','example-auth');
    $routes->get('login','AuthController::loginForm',['as'=> 'admin.login.form']);
    $routes->post('login','AuthController::loginHandler',['as'=>'admin.login.handler']);
    $routes->get('forgot-password','AuthController::forgotForm',['as'=>'admin.forgot.form']);
    $routes->post('send-password-reset-link','AuthController::sendPasswordResetLink',['as'=>'send_password_reset_link']);
    $routes->get('password/reset/(:any)','AuthController::resetPassword/$1',['as'=>'admin.reset-password']);
  });

});
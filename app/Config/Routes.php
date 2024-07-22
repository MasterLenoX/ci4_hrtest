<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('admin', static function ($routes) {

  $routes->group('', ['filter' => 'cifilter:auth'], static function ($routes) {
    // $routes->view('example-page','example-page');
    $routes->get('home', 'AdminController::index', ['as' => 'admin.home']);
    $routes->get('logout', 'AdminController::logoutHandler', ['as' => 'admin.logout']);
    $routes->get('profile', 'AdminController::profile', ['as' => 'admin.profile']);
    $routes->post('update-user-details', 'AdminController::updateUserDetails', ['as' => 'update-user-details']);
    $routes->get('update-profile-picture', 'AdminController::updateProfilePicture', ['as' => 'update-profile-picture']);
    $routes->get('settings', 'AdminController::settings', ['as' => 'settings']);
    $routes->post('change-password', 'AdminController::changePassowrd', ['as' => 'change-password']);
    $routes->post('update-general-settings', 'AdminController::updateGeneralSettings', ['as' => 'update-general-settings']);
    $routes->post('update-logo', 'AdminController::updateLogo', ['as' => 'update-logo']);
    $routes->post('update-favicon', 'AdminController::updateFavicon', ['as' => 'update-favicon']);
    $routes->post('update-social-media', 'AdminController::updateSocialMedia', ['as' => 'update-social-media']);

    //User Tables
    $routes->get('users-page', 'AdminController::usersPage', ['as' => 'users-page']);


    //Employee 
    $routes->get('employee', 'AdminController::employee', ['as' => 'employee']);
    $routes->post('add-employee','AdminController::addEmployee', ['as'=>'add-employee']);
    $routes->get('get-employees','AdminController::getEmployees', ['as'=>'get-employees']);
    $routes->get('get-employee','AdminController::getEmployee',['as'=>'get-employee']);
    $routes->post('update-employee','AdminController::updateEmployee',['as'=>'update-employee']);
    $routes->get('delete-employee','AdminController::deleteEmployee',['as'=>'delete-employee']);


    //Department 
    $routes->get('department', 'AdminController::department', ['as' => 'department']);
    $routes->post('add-department','AdminController::addDepartment',['as'=>'add-department']);
    $routes->get('get-department','AdminController::getDepartment',['as'=>'get-department']);
    $routes->get('get-dept','AdminController::getDept',['as'=>'get-dept']);
    $routes->post('update-department','AdminController::updateDepartment',['as'=>'update-department']);
    $routes->get('delete-department','AdminController::deleteDepartment',['as'=>'delete-department']);

    //Organzation 
    $routes->get('organization', 'AdminController::organization', ['as' => 'organization']);

    
  });

  $routes->group('', ['filter' => 'cifilter:guest'], static function ($routes) {
    // $routes->view('example-auth','example-auth');
    $routes->get('login', 'AuthController::loginForm', ['as' => 'admin.login.form']);
    $routes->post('login', 'AuthController::loginHandler', ['as' => 'admin.login.handler']);
    $routes->get('forgot-password', 'AuthController::forgotForm', ['as' => 'admin.forgot.form']);
    $routes->post('send-password-reset-link', 'AuthController::sendPasswordResetLink', ['as' => 'send_password_reset_link']);
    $routes->get('password/reset/(:any)', 'AuthController::resetPassword/$1', ['as' => 'admin.reset-password']);
    $routes->post('reset-password-handler/(:any)', 'AuthController::resetPasswordHandler/$1', ['as' => 'reset-password-handler']);
  });
});

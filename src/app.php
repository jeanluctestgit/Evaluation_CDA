<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::index',
], [], [], '', [], ['GET']));

$routes->add('home', new Routing\Route('/', [
    '_controller' => 'Itech\Controller\ProductController::index',
], [], [], '', [], ['GET','POST']));



$routes->add('security_register', new Routing\Route('/register', [
    '_controller' => 'Itech\Controller\UserController::register',
], [], [], '', [], ['GET', 'POST']));

$routes->add('users_management', new Routing\Route('/users', [
    '_controller' => 'Itech\Controller\UserController::users',
], [], [], '', [], ['GET', 'POST']));

$routes->add('users_management_delete', new Routing\Route('/users/delete', [
    '_controller' => 'Itech\Controller\UserController::delete',
], [], [], '', [], ['GET', 'POST']));

$routes->add('users_management_update', new Routing\Route('/users/update', [
    '_controller' => 'Itech\Controller\UserController::update',
], [], [], '', [], ['GET', 'POST']));

$routes->add('users_management_update_user', new Routing\Route('/users/update_user', [
    '_controller' => 'Itech\Controller\UserController::update_user',
], [], [], '', [], ['GET', 'POST']));

$routes->add('security_login', new Routing\Route('/login', [
    '_controller' => 'Itech\Controller\UserController::login',
], [], [], '', [], ['GET', 'POST']));

$routes->add('security_profile', new Routing\Route('/profile', [
    '_controller' => 'Itech\Controller\UserController::profile',
], [], [], '', [], ['GET', 'POST']));

$routes->add('security_logout', new Routing\Route('/logout', [
    '_controller' => 'Itech\Controller\UserController::logout',
], [], [], '', [], ['GET']));

$routes->add('add_product', new Routing\Route('/products/add', [
    '_controller' => 'Itech\Controller\ProductController::add',
], [], [], '', [], ['GET','POST']));

$routes->add('delete_product', new Routing\Route('/products/delete', [
    '_controller' => 'Itech\Controller\ProductController::delete',
], [], [], '', [], ['GET','POST']));

$routes->add('update_product', new Routing\Route('/products/update', [
    '_controller' => 'Itech\Controller\ProductController::update',
], [], [], '', [], ['GET','POST']));

$routes->add('modify_product', new Routing\Route('/products/update_product', [
    '_controller' => 'Itech\Controller\ProductController::update_product',
], [], [], '', [], ['GET','POST']));

$routes->add('get_user_product', new Routing\Route('/products', [
    '_controller' => 'Itech\Controller\ProductController::products',
], [], [], '', [], ['GET','POST']));

return $routes;

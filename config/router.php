<?php

$router = new Bramus\Router\Router();

$router->get('/', '\App\Controllers\PageController@homePage');
$router->get('/logout' , '\App\Controllers\UserController@logout');

$router->get('/login', '\App\Controllers\PageController@loginPage');
$router->post('/loginSubmit', '\App\Controllers\UserController@login');

$router->get('/register', '\App\Controllers\PageController@registerPage');
$router->post('/registerSubmit', '\App\Controllers\UserController@register');

$router->get('/search', '\App\Controllers\SearchController@search');

return $router;


<?php 

$router->get('/api/login', 'UsersController@login');
$router->get('/api/logout', 'UsersController@logout');
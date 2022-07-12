<?php

$router->get('/', 'TaskLib@index');

$router->post('/register', 'RegisterLib@register');
$router->post('/login', 'LoginLib@login');
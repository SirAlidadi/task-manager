<?php

$router->get('/', function () {
    header("Content-Type: text/html; charset=UTF-8");
    echo <<<html
    <center>Task Manager</center>
    html;
});

# authenticate
$router->post('/v1/register', 'RegisterLib@register');
$router->post('/v1/login', 'LoginLib@login');

# tasks
$router->get('/v1/tasks', 'TaskLib@index');
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
$router->post('/v1/tasks/store', 'TaskLib@store');
$router->delete('/v1/tasks/:id/destroy', 'TaskLib@destroy');

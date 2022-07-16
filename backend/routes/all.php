<?php

$router->get('/', function () {
    header("Content-Type: text/html; charset=UTF-8");
    echo <<<html
        <h1>Task Manager</h1>
        <ul>
            <h3>Authenticate Routes:</h3>
            <li><strong>Register:</strong> http://localhost/task/v1/register</li>
            <li><strong>Login:</strong> http://localhost/task/v1/login</li>
            <br>
            <h3>Task Routes (need jwt):</h3>
            <li><strong>Get all tasks:</strong> http://localhost/task/v1/tasks</li>
            <li><strong>Create new task:</strong> http://localhost/task/v1/tasks/store</li>
            <li><strong>Done/undone task:</strong> http://localhost/task/v1/tasks/:id/done</li>
            <li><strong>Delete task:</strong> http://localhost/task/v1/tasks/:id/destroy</li>
        </ul>
    html;
});

# authenticate
$router->post('/v1/register', 'RegisterLib@register');
$router->post('/v1/login', 'LoginLib@login');

# tasks
$router->get('/v1/tasks', 'TaskLib@index');
$router->post('/v1/tasks/store', 'TaskLib@store');
$router->put('/v1/tasks/:id/done', 'TaskLib@done');
$router->delete('/v1/tasks/:id/destroy', 'TaskLib@destroy');

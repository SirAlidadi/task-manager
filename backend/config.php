<?php

# Project
$app = [
    'name' => 'Task Manager (React.js)',
    'debug' => true,
    'directory' => dirname($_SERVER['PHP_SELF']),
    'url' => 'http://localhost/task-manager/backend/'
];

# Database connection
$connection = [
    'host' => 'localhost',
    'name' => 'task',
    'user' => 'root',
    'password' => ''
];

define('APP', $app);
define('DB', $connection);

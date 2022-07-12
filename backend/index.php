<?php

/**
 * ====== Change configure parameters on config.php ======
 */



header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once "./vendor/autoload.php";

require_once "./loader.php";

require_once "./config.php";

require_once "./app/functions/helpers.php";

$router = new Buki\Router\Router([
    'base_folder' => $app['directory'],
    'paths' => [
        'controllers' => 'app/libs/',
    ],
    'namespaces' => [
        'controllers' => '\App\Libs\\',
    ],
    'debug' => $app['debug'],
]);

require_once "./routes/all.php";

$router->run();

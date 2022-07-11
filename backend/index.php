<?php
session_start();

require_once "./loader.php";

require_once "./config.php";

use App\Core\Database;

$db = new Database($connection);

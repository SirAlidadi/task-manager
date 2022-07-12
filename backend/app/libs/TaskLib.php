<?php

namespace App\Libs;

use App\Core\Database;
use App\Core\JWTToken;
use Exception;

class TaskLib
{
    public function index()
    {
        $token = getToken();

        $jwt = isset($token) ? $token : "";

        $decoded = JWTToken::verify($jwt);

        $tasks = Database::table('tasks')->where('user_id', $decoded->id)->get();

        echo json_encode([
            'data' => $tasks
        ]);
        exit;
    }

    public function store()
    {
        // code ...
    }

    public function destroy()
    {
        // code ...
    }
}

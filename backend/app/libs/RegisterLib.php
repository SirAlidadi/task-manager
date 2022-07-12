<?php

namespace App\Libs;

use App\Core\Database;
use App\Core\JWTToken;

class RegisterLib
{
    protected array $invalids = [];

    public function register()
    {
        $request = $_POST;

        $this->validate($request);

        Database::table('users')->insert([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        $user = [
            'name' => $request['name'],
            'email' => $request['email'],
        ];

        $jwt = JWTToken::token($user);

        http_response_code(201);
        echo json_encode([
            'message' => 'user created successfuly',
            'user' => $user,
            'token' => $jwt
        ]);
        exit;
    }

    public function validate($fields)
    {
        if (!isset($fields['name']) or empty($fields['name'])) {
            $this->invalids['name'] = "name is required";
        }

        if (!isset($fields['email']) or empty($fields['email'])) {
            $this->invalids['email'] = "email is required";
        }

        if (!isset($fields['password']) or empty($fields['password'])) {
            $this->invalids['password'] = "password is required";
        }

        $emailExists = Database::table('users')->where('email', $fields['email'])->get();

        if ($emailExists != false) {
            $this->invalids['email'] = "email already exists";
        }

        if (count($this->invalids) > 0) {
            $this->erorrs();
        }

        return true;
    }

    public function erorrs()
    {
        http_response_code(400);
        echo json_encode([
            'message' => 'Registeration faild',
            'data' => $this->invalids
        ]);
        exit;
    }
}

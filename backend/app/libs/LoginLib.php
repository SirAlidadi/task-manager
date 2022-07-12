<?php

namespace App\Libs;

use App\Core\Database;
use App\Core\JWTToken;

class LoginLib
{
    protected array $invalids = [];

    public function login()
    {
        $request = $_POST;

        $this->validate($request);

        $user = Database::table('users')->where('email', $request['email'])->get();
        if ($user == false) {
            http_response_code(401);
            echo json_encode(["message" => "user not exists"]);
            exit;
        }

        if ($user->password != md5($request['password'])) {
            http_response_code(401);
            echo json_encode(["message" => "login failed"]);
            exit;
        }

        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];
        
        $jwt = JWTToken::token($userData);

        http_response_code(200);
        echo json_encode([
            'message' => 'login successfuly',
            'user' => $userData,
            'token' => $jwt
        ]); 
        exit;
    }

    public function validate($fields)
    {
        if (!isset($fields['email']) or empty($fields['email'])) {
            $this->invalids['email'] = "email is required";
        }

        if (!isset($fields['password']) or empty($fields['password'])) {
            $this->invalids['password'] = "password is required";
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

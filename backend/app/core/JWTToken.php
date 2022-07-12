<?php

namespace App\Core;

use Firebase\JWT\Key;
use Firebase\JWT\JWT;

class JWTToken
{
    public static function token(array $data)
    {
        $key = 'task_manager';

        $payload = [
            'iss' => APP['url'],
            'aud' => APP['url'],
            'iat' => 1356999524,
            'nbf' => 1357000000,
            'data' => $data
        ];

        return JWT::encode($payload, $key, 'HS256');
    }
}

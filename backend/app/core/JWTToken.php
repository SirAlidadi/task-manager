<?php

namespace App\Core;

use Firebase\JWT\Key;
use Firebase\JWT\JWT;

class JWTToken
{
    protected static $key = 'task_manager';

    public static function token(array $data)
    {
        $payload = [
            'iss' => APP['url'],
            'aud' => APP['url'],
            'iat' => 1356999524,
            'nbf' => 1357000000,
            'data' => $data
        ];

        return JWT::encode($payload, self::$key, 'HS256');
    }

    public static function verify(string $jwt)
    {
        $decoded = JWT::decode($jwt, new Key(self::$key, 'HS256'));

        return $decoded->data;
    }
}

<?php

namespace App\Helpers;

class ApiFormatter
{
    protected static $response = [
        'code' => null,
        'message' => null,
        'payload' => null,
    ];

    public static function response($code = null, $message = null, $payload = null)
    {
        self::$response['code'] = $code;
        self::$response['message'] = $message;
        self::$response['payload'] = $payload;

        return response()->json(self::$response, self::$response['code']);
    }
}
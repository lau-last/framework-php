<?php

namespace App\Http;

class Response
{
    public static array $statusTexts = [
        100 => 'Continue',
        101 => 'Switching',
        103 => 'Checkpoint',
        200 => 'Ok',
        201 => 'Created',
        202 => 'Accepted',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        306 => 'Switch Proxy',
        307 => 'Temp Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Req',
        403 => 'Forbidden',
        404 => 'Not Found',
        406 => 'Not Acceptable',
        410 => 'Gone',
        500 => 'Server Error',
        502 => 'Bad Gateway',
        504 => 'Timeout',
    ];
}
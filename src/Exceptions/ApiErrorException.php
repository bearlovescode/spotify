<?php
namespace Bearlovescode\Spotify\Exceptions;

class ApiErrorException extends \Exception
{
    public function __construct(mixed $data, ?Throwable $previous = null)
    {
        $code = -127;
        parent::__construct($data->message, $data->status, $previous);
    }
}
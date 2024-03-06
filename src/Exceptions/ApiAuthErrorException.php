<?php
    namespace Bearlovescode\Spotify\Exceptions;

    class ApiAuthErrorException extends \Exception
    {
        public function __construct(mixed $data, ?Throwable $previous = null)
        {
            $code = -127;
            parent::__construct($data->error_description, null, $previous);
        }
    }
<?php

namespace KMA\IikoTransport\Exceptions;

class ResponseException extends \Exception
{
    public function __construct(\KMA\IikoTransport\Http\Response $response)
    {
        $message = sprintf(
            'Response return with code %s and message %s',
            $response->getHttpStatusCode(),
            $response->getBody()
        );

        parent::__construct($message);
    }
}

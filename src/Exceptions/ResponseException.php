<?php

namespace KMA\IikoTransport\Exceptions;

use Psr\Http\Message\ResponseInterface;

class ResponseException extends \Exception
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private ResponseInterface $response;

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;

        $encoded = json_decode($response->getBody(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $message = 'Response is not a valid JSON: ' . json_last_error_msg();
        } elseif (!$encoded) {
            $message = 'Response return empty body';
        } else {
            $message = sprintf(
                'Response return with code %s and message %s',
                $response->getStatusCode(),
                $encoded['errorDescription']
            );
        }

        parent::__construct($message);
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}

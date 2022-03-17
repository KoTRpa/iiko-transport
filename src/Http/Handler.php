<?php

namespace KMA\IikoTransport\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Utils;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class Handler
{
    /** @var \GuzzleHttp\Promise\PromiseInterface[] Holds promises. */
    private static array $promises = [];

    /** @var \GuzzleHttp\Client HTTP client. */
    protected Client $client;

    /** @var int Timeout of the request in seconds. */
    protected int $timeOut = 60;

    /** @var int Connection timeout of the request in seconds. */
    protected int $connectTimeOut = 10;


    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * Unwrap Promises.
     * @throws Throwable
     */
    public function __destruct()
    {
        Utils::unwrap(self::$promises);
    }

    /**
     * Send request
     *
     * @param string $url
     * @param string $method HTTP method
     * @param array $headers HTTP Headers
     * @param array $options Request options to apply. See \GuzzleHttp\RequestOptions.
     * @param bool $isAsyncRequest default false
     * @return mixed
     */
    public function send(
        string $url,
        string $method,
        array $headers = [],
        array $options = [],
        bool $isAsyncRequest = false
    ): mixed
    {
        $body = $options['body'] ?? null;
        $options = $this->getOptions($headers, $body, $options, $isAsyncRequest);

        try {
            $response = $this->getClient()->requestAsync($method, $url, $options);

            if ($isAsyncRequest) {
                self::$promises[] = $response;
            } else {
                $response = $response->wait();
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if (!$response instanceof ResponseInterface) {
                throw new \RuntimeException('Unknown response: ' . $e->getMessage());
            }
        }

        return $response;
    }

    /**
     * Prepares and returns request options.
     *
     * @param array $headers
     * @param array $body
     * @param array $options
     * @param bool $isAsyncRequest
     *
     * @return array
     */
    private function getOptions(
        array $headers,
        mixed $body,
        array $options,
        bool $isAsyncRequest = false
    ): array
    {
        $default_options = [
            RequestOptions::HEADERS => $headers,
            RequestOptions::BODY => $body,
            RequestOptions::TIMEOUT => $this->getTimeOut(),
            RequestOptions::CONNECT_TIMEOUT => $this->getConnectTimeOut(),
            RequestOptions::SYNCHRONOUS => !$isAsyncRequest,
        ];

        return array_merge($default_options, $options);
    }

    /**
     * Response timeout
     *
     * @returns int
     */
    public function getTimeOut(): int
    {
        return $this->timeOut;
    }

    /**
     * Set response timeout
     *
     * @param int $timeOut
     * @return Handler
     */
    public function setTimeOut(int $timeOut): self
    {
        $this->timeOut = $timeOut;

        return $this;
    }

    /**
     * Connection timeout
     * @return int
     */
    public function getConnectTimeOut(): int
    {
        return $this->connectTimeOut;
    }

    /**
     * Set connection timeout
     * @param int $connectTimeOut
     * @return Handler
     */
    public function setConnectTimeOut(int $connectTimeOut): self
    {
        $this->connectTimeOut = $connectTimeOut;

        return $this;
    }

    /**
     * Gets HTTP client for internal class use.
     *
     * @return Client
     */
    private function getClient(): Client
    {
        return $this->client;
    }
}

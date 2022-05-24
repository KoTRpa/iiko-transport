<?php

namespace KMA\IikoTransport\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use KMA\IikoTransport\Contracts\IRequestBody;
use KMA\IikoTransport\Exceptions\ResponseException;
use Psr\Http\Message\ResponseInterface;

/**
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Http
{
    /**
     * @var \GuzzleHttp\Client|null http requests handler
     */
    protected ?Client $client = null;

    /**
     * @var array default GuzzleHttp\Client params
     */
    protected array $defaultParams = [
        'base_uri' => 'https://api-ru.iiko.services/api/1/',
        RequestOptions::CONNECT_TIMEOUT => 10,  // Connection timeout of the request in seconds
        RequestOptions::TIMEOUT => 60, // Timeout of the request in seconds
        RequestOptions::HTTP_ERRORS => false,
    ];

    /**
     * @var array Default request headers
     */
    protected array $defaultHeaders = [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'User-Agent' => 'IikoTransport'
    ];


    /**
     * Sends a GET request to API and returns the result.
     *
     * @param string $endpoint
     * @param array  $params
     * @param array  $headers
     *
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     */
    protected function get(string $endpoint, array $params = [], array $headers = []): ResponseInterface
    {
        return $this->send('GET', $endpoint, null, $params, $headers);
    }

    /**
     * Sends a POST request to API and returns the result.
     *
     * @param string $endpoint
     * @param \KMA\IikoTransport\Contracts\IRequestBody|null $body JSON encoded string
     * @param array $params
     * @param array $headers
     *
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    protected function post(string $endpoint, IRequestBody $body = null, array $params = [], array $headers = []): ResponseInterface
    {
        return $this->send('POST', $endpoint, $body->toJson(), $params, $headers);
    }

    /**
     * Sends a request to API and returns the result.
     *
     * @param string $method
     * @param string $endpoint
     * @param string|null $body
     * @param array $params
     * @param array $headers
     *
     * @return \Psr\Http\Message\ResponseInterface
     *
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function send(string $method, string $endpoint, string $body = null, array $params = [], array $headers = []): ResponseInterface
    {
        $request = new Request(
            $method,
            $endpoint,
            array_merge($this->defaultHeaders, $headers),
            $body
        );

        $response = $this->getClient()->send($request, array_merge($this->defaultParams, $params));

        if (in_array($response->getStatusCode(), [400, 401, 408, 500])) {
            throw new ResponseException($response);
        }

        return $response;
    }

    /**
     * Returns the Iiko Client service.
     *
     * @return \GuzzleHttp\Client HTTP client
     */
    protected function getClient(): Client
    {
        if (!$this->client) {
            $config = $this->getConfig('http', []);
            $this->client = new Client($config);
        }
        return $this->client;
    }
}
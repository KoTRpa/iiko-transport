<?php

namespace KMA\IikoTransport\Traits;

use KMA\IikoTransport\Exceptions\IikoHttpException;
use KMA\IikoTransport\Exceptions\ResponseException;
use KMA\IikoTransport\Http\Client;
use KMA\IikoTransport\Http\Handler;
use KMA\IikoTransport\Http\Request;
use KMA\IikoTransport\Http\Response;

/**
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Http
{
    /** @var string base API URL. */
    protected string $baseUrl = 'https://api-ru.iiko.services/api/1/';

    /** @var \KMA\IikoTransport\Http\Client|null The Iiko API client service. */
    protected ?Client $client = null;

    /** @var bool Indicates if the request to will be asynchronous (non-blocking). */
    protected bool $isAsyncRequest = false;

    /** @var int Timeout of the request in seconds. */
    protected int $timeOut = 60;

    /** @var int Connection timeout of the request in seconds. */
    protected int $connectTimeOut = 10;

    /** @var Response|null Stores the last request made to API. */
    protected ?Response $lastResponse;

    /**
     * Returns the last response returned from API request.
     *
     * @return \KMA\IikoTransport\Http\Response|null
     */
    public function getLastResponse(): ?Response
    {
        return $this->lastResponse;
    }

    /**
     * Check if this is an asynchronous request (non-blocking).
     *
     * @return bool
     */
    public function isAsyncRequest(): bool
    {
        return $this->isAsyncRequest;
    }

    /**
     * @return int
     */
    public function getTimeOut(): int
    {
        return $this->timeOut;
    }

    /**
     * @param int $timeOut
     *
     * @return $this
     */
    public function setTimeOut(int $timeOut): static
    {
        $this->timeOut = $timeOut;

        return $this;
    }

    /**
     * @return int
     */
    public function getConnectTimeOut(): int
    {
        return $this->connectTimeOut;
    }

    /**
     * @param int $connectTimeOut
     *
     * @return $this
     */
    public function setConnectTimeOut(int $connectTimeOut): static
    {
        $this->connectTimeOut = $connectTimeOut;

        return $this;
    }

    /**
     * Returns the Iiko Client service.
     *
     * @return \KMA\IikoTransport\Http\Client
     */
    protected function getClient(): Client
    {
        if ($this->client === null) {
            $this->client = new Client(
                $this->getConfig('url')
            );
        }

        return $this->client;
    }

    /**
     * Sends a GET request to API and returns the result.
     *
     * @param string $endpoint
     * @param array  $params
     *
     * @return Response
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     */
    protected function get(string $endpoint, array $params = []): Response
    {
        return $this->sendRequest('GET', $endpoint, $params);
    }

    /**
     * Sends a POST request to API and returns the result.
     *
     * @param string $endpoint
     * @param array $params
     * @param array $headers
     * @return \KMA\IikoTransport\Http\Response
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     */
    protected function post(string $endpoint, array $params = [], array $headers = []): Response
    {
        // $params = $this->normalizeParams($params);

        return $this->sendRequest('POST', $endpoint, $params, $headers);
    }

    /**
     * Sends a request to API and returns the result.
     *
     * @param string $method
     * @param string $endpoint
     * @param array  $params
     * @param array $headers
     *
     * @return \KMA\IikoTransport\Http\Response
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     */
    protected function sendRequest(string $method, string $endpoint, array $params = [], array $headers = []): Response
    {
        $request = new Request(
            $method,
            $endpoint,
            $params,
            $headers,
            $this->isAsyncRequest()
        );

        $request
            ->setTimeOut($this->getTimeOut())
            ->setConnectTimeOut($this->getConnectTimeOut());

        return $this->lastResponse = $this->getClient()->sendRequest($request);
    }

    /**
     * Instantiates a new IikoRequest entity.
     *
     * @param string $method
     * @param string $endpoint
     * @param array  $params
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    protected function resolveRequest(string $method, string $endpoint, array $params = [], $headers = []): Request
    {
        return (new Request(
            $this->getToken(),
            $method,
            $endpoint,
            $params,
            $this->isAsyncRequest()
        ))
            ->setHeaders($headers)
            ->setTimeOut($this->getTimeOut())
            ->setConnectTimeOut($this->getConnectTimeOut());
    }

    /**
     * @param array $params
     *
     * @return array
     */
    private function normalizeParams(array $params): array
    {

        return ['form_params' => $params];
    }
}

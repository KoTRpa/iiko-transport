<?php

namespace KMA\IikoTransport\Http;

use KMA\IikoTransport\Exceptions\IikoHttpException;

/**
 * Builds API Request Entity.
 */
class Request
{
    /** @var string|null The access token to use for this request. */
    protected ?string $token;

    /** @var string The HTTP method for this request. */
    protected string $method;

    /** @var string The API endpoint for this request. */
    protected string $endpoint;

    /** @var array The headers to send with this request. */
    protected array $headers = [];

    /** @var array The parameters to send with this request. */
    protected array $params = [];

    /** @var array The files to send with this request. */
    protected array $files = [];

    /** @var bool Indicates if the request will be asynchronous (non-blocking). */
    protected bool $isAsyncRequest = false;

    /** @var int Timeout of the request in seconds. */
    protected int $timeOut;

    /** @var int Connection timeout of the request in seconds. */
    protected int $connectTimeOut;

    /**
     * Creates a new Request entity.
     *
     * @param string|null $method
     * @param string|null $endpoint
     * @param array $params
     * @param array $headers
     * @param bool $isAsyncRequest
     */
    public function __construct(
        string $method = null,
        string $endpoint = null,
        array $params = [],
        array $headers = [],
        bool $isAsyncRequest = false
    ) {
        $this->setMethod($method);
        $this->setEndpoint($endpoint);
        $this->setParams($params);
        $this->setHeaders($headers);
        $this->setAsyncRequest($isAsyncRequest);
    }

    /**
     * Make this request asynchronous (non-blocking).
     *
     * @param bool $isAsyncRequest
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    public function setAsyncRequest(bool $isAsyncRequest): self
    {
        $this->isAsyncRequest = $isAsyncRequest;

        return $this;
    }

    /**
     * Validate that the HTTP method is set.
     * @TODO: replace method list with enum
     * @throws \KMA\IikoTransport\Exceptions\IikoHttpException
     */
    public function validateMethod()
    {
        if (!$this->method) {
            throw new IikoHttpException('HTTP method not specified.');
        }

        if (!in_array($this->method, ['GET', 'POST'])) {
            throw new IikoHttpException('Invalid HTTP method specified. Must be GET or POST');
        }
    }

    /**
     * Return the API Endpoint for this request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Set the endpoint for this request.
     *
     * @param string $endpoint
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Return the headers for this request.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return array_merge($this->getDefaultHeaders(), $this->headers);
    }

    /**
     * Set the headers for this request.
     *
     * @param array $headers
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    public function setHeaders(array $headers): self
    {
        $this->headers = array_merge($this->headers, $headers);

        return $this;
    }

    /**
     * The default headers used with every request.
     *
     * @return array
     */
    public function getDefaultHeaders(): array
    {
        return [
            'User-Agent' => 'IikoAPI PHP',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
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
     * Return the HTTP method for this request.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Set the HTTP method for this request.
     *
     * @param string
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    public function setMethod(string $method): self
    {
        $this->method = strtoupper($method);

        return $this;
    }

    /**
     * Only return params on POST requests.
     *
     * @return array
     */
    public function getPostParams(): array
    {
        if ($this->getMethod() === 'POST') {
            return $this->getParams();
        }

        return [];
    }

    /**
     * Return the params for this request.
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Set the params for this request.
     *
     * @param array $params
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    public function setParams(array $params = []): self
    {
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * Get Timeout.
     *
     * @return int
     */
    public function getTimeOut(): int
    {
        return $this->timeOut;
    }

    /**
     * Set Timeout.
     *
     * @param int $timeOut
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    public function setTimeOut(int $timeOut): self
    {
        $this->timeOut = $timeOut;

        return $this;
    }

    /**
     * Get Connection Timeout.
     *
     * @return int
     */
    public function getConnectTimeOut(): int
    {
        return $this->connectTimeOut;
    }

    /**
     * Set Connection Timeout.
     *
     * @param int $connectTimeOut
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    public function setConnectTimeOut(int $connectTimeOut): self
    {
        $this->connectTimeOut = $connectTimeOut;

        return $this;
    }
}

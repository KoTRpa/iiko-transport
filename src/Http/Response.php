<?php

namespace KMA\IikoTransport\Http;

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use KMA\IikoTransport\Helpers\Json;
use KMA\IikoTransport\Exceptions\ResponseException;
use KMA\IikoTransport\Exceptions\IikoHttpException;

/**
 * Handles the response from API.
 */
class Response
{
    /** @var null|int The HTTP status code response from API. */
    protected ?int $httpStatusCode;

    /** @var array The headers returned from API request. */
    protected array $headers;

    /** @var string The raw body of the response from API request. */
    protected string $body;

    /** @var array|string The decoded body of the API response. */
    protected array|string $decodedBody;

    /** @var string API Endpoint used to make the request. */
    protected string $endPoint;

    /** @var \KMA\IikoTransport\Http\Request The original request that returned this response. */
    protected Request $request;

    /** @var ResponseException The exception thrown by this request. */
    protected ResponseException $thrownException;

    /**
     * Gets the relevant data from the Http client.
     *
     * @param \KMA\IikoTransport\Http\Request $request
     * @param \Psr\Http\Message\ResponseInterface|\GuzzleHttp\Promise\PromiseInterface $response
     * @throws \JsonException
     * @throws \InvalidArgumentException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     */
    public function __construct(Request $request, ResponseInterface|PromiseInterface $response)
    {
        if (!($response instanceof ResponseInterface)) {
            throw new \InvalidArgumentException('Unknown response format');
        }

        $this->request = $request;
        $this->endPoint = $request->getEndpoint();
        $this->httpStatusCode = $response->getStatusCode();
        $this->body = $response->getBody();
        $this->headers = $response->getHeaders();
        $this->decodedBody = Json::json_decode($this->body, true);

        if ($this->getHttpStatusCode() >= 400) {
            throw new ResponseException($this);
        }
    }

    /**
     * Return the original request that returned this response.
     *
     * @return \KMA\IikoTransport\Http\Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * Gets the HTTP status code.
     * Returns NULL if the request was asynchronous since we are not waiting for the response.
     *
     * @return null|int
     */
    public function getHttpStatusCode(): ?int
    {
        return $this->httpStatusCode;
    }

    /**
     * Gets the Request Endpoint used to get the response.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endPoint;
    }

    /**
     * Return the HTTP headers for this response.
     *
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Return the raw body response.
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Return the decoded body response.
     *
     * @return array|string
     */
    public function getDecodedBody(): array|string
    {
        return $this->decodedBody;
    }

    /**
     * Helper function to return the payload of a successful response.
     *
     * @return mixed
     */
    public function getResult(): mixed
    {
        return $this->decodedBody['result'];
    }
}

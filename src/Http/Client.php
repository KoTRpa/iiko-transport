<?php

namespace KMA\IikoTransport\Http;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

final class Client
{
    /** @var \KMA\IikoTransport\Http\Handler HTTP Handler. */
    protected Handler $httpClientHandler;

    /**
     * Instantiates a new IikoClient object
     *
     * @param string $baseUrl
     */
    public function __construct(protected string $baseUrl)
    {
        $this->httpClientHandler = new Handler();
    }

    /**
     * Returns the HTTP client handler.
     *
     * @return \KMA\IikoTransport\Http\Handler
     */
    public function getHttpClientHandler(): Handler
    {
        return $this->httpClientHandler;
    }

    /**
     * Send an API request and process the result.
     *
     * @param \KMA\IikoTransport\Http\Request $request
     *
     * @return \KMA\IikoTransport\Http\Response
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \JsonException
     */
    public function sendRequest(Request $request): Response
    {
        [$url, $method, $headers, $isAsyncRequest] = $this->prepareRequest($request);

        $options = $this->getOption($request, $method);

        $rawResponse = $this->getHttpClientHandler()
            ->setTimeOut($request->getTimeOut())
            ->setConnectTimeOut($request->getConnectTimeOut())
            ->send(
                $url,
                $method,
                $headers,
                $options,
                $isAsyncRequest
            );

        return $this->response($request, $rawResponse);
    }

    /**
     * Prepares the API request for sending to the client handler.
     *
     * @param \KMA\IikoTransport\Http\Request $request
     *
     * @return array
     */
    public function prepareRequest(Request $request): array
    {
        $url = $this->getBaseUrl() . $request->getEndpoint();

        return [
            $url,
            $request->getMethod(),
            $request->getHeaders(),
            $request->isAsyncRequest(),
        ];
    }

    /**
     * Returns the base Bot URL.
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Creates response object.
     *
     * @param \KMA\IikoTransport\Http\Request $request
     * @param \GuzzleHttp\Promise\PromiseInterface|\Psr\Http\Message\ResponseInterface $response
     *
     * @return \KMA\IikoTransport\Http\Response
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     */
    protected function response(Request $request, PromiseInterface|ResponseInterface $response): Response
    {
        return new Response($request, $response);
    }

    /**
     * @param \KMA\IikoTransport\Http\Request $request
     * @param string $method
     *
     * @return array
     */
    private function getOption(Request $request, string $method): array
    {
        if ($method === 'POST') {
            return ['json' => $request->getPostParams()];
        }

        return ['query' => $request->getParams()];
    }
}

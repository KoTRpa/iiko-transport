<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Exceptions\MissingTokenException;

/**
 * Get Token API
 *
 * @mixin \KMA\IikoTransport\Traits\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Auth
{
    /**
     * @return string
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     */
    public function accessToken(): string
    {
        $endpoint = 'access_token';
        $apiLogin = $this->getConfig('login');
        $params = ['apiLogin' => $apiLogin];
        $response = $this->post($endpoint, $params);
        $body = $response->getDecodedBody();

        if (empty($body['token'])) {
            throw new MissingTokenException('Auth request no token return');
        }

        return $body['token'];
    }
}

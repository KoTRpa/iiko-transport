<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Authorization\AccessTokenRequest;
use KMA\IikoTransport\Exceptions\MissingTokenException;
use KMA\IikoTransport\Helpers\Json;

/**
 * Get Token API
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Auth
{
    /**
     * @return string token
     *
     * @throws MissingTokenException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     */
    public function accessToken(): string
    {
        $response = $this->post(
            'access_token',
            new AccessTokenRequest([
                'apiLogin' => $this->getConfig('login')
            ])
        );

        $body = Json::json_decode($response->getBody(), true);

        if (empty($body['token'])) {
            throw new MissingTokenException('Auth request no token return');
        }

        return $body['token'];
    }
}

<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest;
use KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse;

/**
 * Delivery APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 * @mixin \KMA\IikoTransport\Endpoints\Auth
 */
trait Delivery
{
    /**
     * @param \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest $request
     * @return \KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createDelivery(CreateDeliveryRequest $request): CreateDeliveryResponse
    {
        $endpoint = 'deliveries/create';

        $response = $this->post($endpoint, $request, [
            'Authorization' => 'Bearer ' . $this->accessToken()
        ]);

        return CreateDeliveryResponse::fromJson($response->getBody());
    }
}

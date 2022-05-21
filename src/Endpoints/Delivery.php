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
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \JsonException
     */
    public function createDelivery(CreateDeliveryRequest $request): CreateDeliveryResponse
    {
        $endpoint = 'deliveries/create';

        $params = (array)$request;

        $response = $this->post($endpoint, $params, [
            'Authorization' => 'Bearer ' . $this->accessToken()
        ]);

        return CreateDeliveryResponse::fromJson($response->getBody());
    }
}

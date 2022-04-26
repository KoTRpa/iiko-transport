<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest;
use KMA\IikoTransport\Http\Response;

/**
 * Nomenclature APIs
 *
 * @mixin \KMA\IikoTransport\Traits\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 * @mixin \KMA\IikoTransport\Endpoints\Auth
 */
trait Delivery
{
    /**
     * @param \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest $request
     * @return \KMA\IikoTransport\Http\Response
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     */
    public function createDelivery(CreateDeliveryRequest $request): Response
    {
        $endpoint = 'deliveries/create';

        $params = (array)$request;

        $response = $this->post($endpoint, $params, [
            'Authorization' => 'Bearer ' . $this->accessToken()
        ]);

        // $data = $response->getDecodedBody();

        return $response;
    }
}

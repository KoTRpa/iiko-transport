<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Requests\CreateDeliveryRequest;
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
     * @param string $orgId iiko organization id
     * @return \KMA\IikoTransport\Entities\Nomenclature
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \JsonMapper_Exception
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

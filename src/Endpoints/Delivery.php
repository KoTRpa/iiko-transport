<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest;
use KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdRequest;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdResponse;

/**
 * Delivery APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Delivery
{
    /**
     * @param \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest $request
     *
     * @return \KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function createDelivery(CreateDeliveryRequest $request): CreateDeliveryResponse
    {
        $response = $this->post(
            'deliveries/create',
            $request
        );

        return CreateDeliveryResponse::fromJson($response->getBody());
    }

    /**
     * @param RetrieveByIdRequest $request
     *
     * @return RetrieveByIdResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function retrieveById(RetrieveByIdRequest $request): RetrieveByIdResponse
    {
        $response = $this->post(
            'deliveries/by_id',
            $request
        );

        return RetrieveByIdResponse::fromJson($response->getBody());
    }
}

<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryResponse;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdRequest;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdResponse;
use KMA\IikoTransport\Entities\Delivery\Addresses\CitiesRequest;
use KMA\IikoTransport\Entities\Delivery\Addresses\CitiesResponse;

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
     * @return \KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryResponse
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


    /**
     * @param CitiesRequest $request
     *
     * @return CitiesResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function cities(CitiesRequest $request): CitiesResponse
    {
        $response = $this->post(
            'cities',
            $request
        );

        return CitiesResponse::fromJson($response->getBody());
    }
}

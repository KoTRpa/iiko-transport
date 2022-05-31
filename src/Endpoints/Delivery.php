<?php

namespace KMA\IikoTransport\Endpoints;

use KMA\IikoTransport\Endpoints\Delivery\Addresses\CitiesRequest;
use KMA\IikoTransport\Endpoints\Delivery\Addresses\CitiesResponse;
use KMA\IikoTransport\Endpoints\Delivery\Addresses\StreetsRequest;
use KMA\IikoTransport\Endpoints\Delivery\Addresses\StreetsResponse;
use KMA\IikoTransport\Endpoints\Delivery\Create\CreateDeliveryRequest;
use KMA\IikoTransport\Endpoints\Delivery\Create\CreateDeliveryResponse;
use KMA\IikoTransport\Endpoints\Delivery\Restrictions\DeliveryRestrictionsRequest;
use KMA\IikoTransport\Endpoints\Delivery\Restrictions\DeliveryRestrictionsResponse;
use KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveByIdRequest;
use KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveByIdResponse;

/**
 * Deliveries APIs
 *
 * @mixin \KMA\IikoTransport\Http\Http
 * @mixin \KMA\IikoTransport\IikoTransport
 */
trait Delivery
{
    /**
     * @param \KMA\IikoTransport\Endpoints\Delivery\Create\CreateDeliveryRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\Delivery\Create\CreateDeliveryResponse
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


    /**
     * @param StreetsRequest $request
     *
     * @return StreetsResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function streets(StreetsRequest $request): StreetsResponse
    {
        $response = $this->post(
            'streets/by_city',
            $request
        );

        return StreetsResponse::fromJson($response->getBody());
    }


    /**
     * @param DeliveryRestrictionsRequest $request
     *
     * @return DeliveryRestrictionsResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function deliveryRestrictions(DeliveryRestrictionsRequest $request): DeliveryRestrictionsResponse
    {
        $response = $this->post(
            'delivery_restrictions',
            $request
        );

        return DeliveryRestrictionsResponse::fromJson($response->getBody());
    }


}

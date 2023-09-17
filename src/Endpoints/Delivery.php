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
use KMA\IikoTransport\Endpoints\Delivery\Restrictions\SuitableTerminalGroupsRequest;
use KMA\IikoTransport\Endpoints\Delivery\Restrictions\SuitableTerminalGroupsResponse;
use KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveDeliveryByIdRequest;
use KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveDeliveryByIdResponse;

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
     * @param \KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveDeliveryByIdRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveDeliveryByIdResponse
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function retrieveDeliveryById(RetrieveDeliveryByIdRequest $request): RetrieveDeliveryByIdResponse
    {
        $response = $this->post(
            'deliveries/by_id',
            $request
        );

        return RetrieveDeliveryByIdResponse::fromJson($response->getBody());
    }


    /**
     * @param \KMA\IikoTransport\Endpoints\Delivery\Addresses\CitiesRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\Delivery\Addresses\CitiesResponse
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
     * @param \KMA\IikoTransport\Endpoints\Delivery\Addresses\StreetsRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\Delivery\Addresses\StreetsResponse
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
     * @param \KMA\IikoTransport\Endpoints\Delivery\Restrictions\DeliveryRestrictionsRequest $request
     *
     * @return \KMA\IikoTransport\Endpoints\Delivery\Restrictions\DeliveryRestrictionsResponse
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

    /**
     * @param \KMA\IikoTransport\Endpoints\Delivery\Restrictions\SuitableTerminalGroupsRequest $request
     * @return \KMA\IikoTransport\Endpoints\Delivery\Restrictions\SuitableTerminalGroupsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \JsonException
     * @throws \KMA\IikoTransport\Exceptions\MissingRequiredFieldException
     * @throws \KMA\IikoTransport\Exceptions\MissingTokenException
     * @throws \KMA\IikoTransport\Exceptions\ResponseException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function suitableTerminalGroups(SuitableTerminalGroupsRequest $request): SuitableTerminalGroupsResponse
    {
        $response = $this->post(
            'delivery_restrictions/allowed',
            $request
        );

        return SuitableTerminalGroupsResponse::fromJson($response->getBody());
    }


}

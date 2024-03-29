<?php

namespace KMA\IikoTransport\Tests\Endpoints;

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
use KMA\IikoTransport\Tests\EndpointTestCase;

class DeliveryTest extends EndpointTestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::createDelivery
     */
    public function testCreateDelivery()
    {
        $this->runTests(
            'Deliveries/CreateDeliveryResponse',
            'createDelivery',
            CreateDeliveryRequest::class,
            CreateDeliveryResponse::class,
            '/api/1/deliveries/create'
        );
    }

    /**
     * @covers \KMA\IikoTransport\IikoTransport::retrieveDeliveryById
     */
    public function testRetrieveDeliveryById()
    {
        $this->runTests(
            'Deliveries/RetrieveDeliveryByIdResponse',
            'retrieveDeliveryById',
            RetrieveDeliveryByIdRequest::class,
            RetrieveDeliveryByIdResponse::class,
            '/api/1/deliveries/by_id'
        );
    }

    /**
     * @covers \KMA\IikoTransport\IikoTransport::cities
     */
    public function testCities()
    {
        $this->runTests(
            'Deliveries/CitiesResponse',
            'cities',
            CitiesRequest::class,
            CitiesResponse::class,
            '/api/1/cities'
        );
    }

    /**
     * @covers \KMA\IikoTransport\IikoTransport::streets
     */
    public function testStreets()
    {
        $this->runTests(
            'Deliveries/StreetsResponse',
            'streets',
            StreetsRequest::class,
            StreetsResponse::class,
            '/api/1/streets/by_city'
        );
    }

    /**
     * @covers \KMA\IikoTransport\IikoTransport::deliveryRestrictions
     */
    public function testDeliveryRestrictions()
    {
        $this->runTests(
            'Deliveries/RestrictionsResponse',
            'deliveryRestrictions',
            DeliveryRestrictionsRequest::class,
            DeliveryRestrictionsResponse::class,
            '/api/1/delivery_restrictions'
        );
    }

    /**
     * @covers \KMA\IikoTransport\IikoTransport::suitableTerminalGroups
     */
    public function testSuitableTerminalGroups()
    {
        $this->runTests(
            'Deliveries/SuitableTerminalGroupsResponse',
            'suitableTerminalGroups',
            SuitableTerminalGroupsRequest::class,
            SuitableTerminalGroupsResponse::class,
            '/api/1/delivery_restrictions/allowed'
        );
    }
}

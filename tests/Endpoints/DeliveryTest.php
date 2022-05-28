<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use KMA\IikoTransport\Tests\EndpointTestCase;

use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryResponse;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdRequest;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdResponse;
use KMA\IikoTransport\Entities\Delivery\Addresses\CitiesRequest;
use KMA\IikoTransport\Entities\Delivery\Addresses\CitiesResponse;

class DeliveryTest extends EndpointTestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::createDelivery
     */
    public function testCreateDelivery()
    {
        $this->runTests(
            'Delivery/CreateDeliveryResponse',
            'createDelivery',
            CreateDeliveryRequest::class,
            CreateDeliveryResponse::class,
            '/api/1/deliveries/create'
        );
    }

    /**
     * @covers \KMA\IikoTransport\IikoTransport::retrieveById
     */
    public function testRetrieveById()
    {
        $this->runTests(
            'Delivery/RetrieveByIdResponse',
            'retrieveById',
            RetrieveByIdRequest::class,
            RetrieveByIdResponse::class,
            '/api/1/deliveries/by_id'
        );
    }

    /**
     * @covers \KMA\IikoTransport\IikoTransport::cities
     */
    public function testCities()
    {
        $this->runTests(
            'Delivery/CitiesResponse',
            'cities',
            CitiesRequest::class,
            CitiesResponse::class,
            '/api/1/cities'
        );
    }
}

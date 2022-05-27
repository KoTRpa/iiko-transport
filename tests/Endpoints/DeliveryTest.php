<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest;
use KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdRequest;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdResponse;
use KMA\IikoTransport\IikoTransport;
use KMA\IikoTransport\Tests\JsonFactory;
use PHPUnit\Framework\TestCase;

class DeliveryTest extends TestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::createDelivery
     */
    public function testCreateDelivery()
    {
        $jsonAuth = JsonFactory::all('auth');
        $jsonCreateDelivery = JsonFactory::all('Delivery/createDeliveryResponse');

        $mock = new MockHandler([
            new Response(200, ['content-type' => 'application/json; charset=utf-8'], $jsonAuth),
            new Response(200, ['content-type' => 'application/json; charset=utf-8'], $jsonCreateDelivery),
        ]);

        $handlerStack = HandlerStack::create($mock);

        $requestHistory = [];
        $handlerStack->push(Middleware::history($requestHistory));

        $iiko = new IikoTransport([
            'url' => '/',
            'login' => 'demo',
            'http' => [
                'handler' => $handlerStack
            ]
        ]);

        $response = $iiko->createDelivery(new CreateDeliveryRequest);

        $this->assertCount(2, $requestHistory);

        $this->assertEquals('/api/1/deliveries/create', $requestHistory[1]['request']->getUri()->getPath());
        $this->assertEquals(200, $requestHistory[1]['response']->getStatusCode());

        $this->assertInstanceOf(CreateDeliveryResponse::class, $response);
        $this->assertEquals(CreateDeliveryResponse::fromJson($jsonCreateDelivery), $response);
    }

    /**
     * @covers \KMA\IikoTransport\IikoTransport::retrieveById
     */
    public function testRetrieveById()
    {
        $jsonAuth = JsonFactory::all('auth');
        $json = JsonFactory::all('Delivery/RetrieveByIdResponse');

        $mock = new MockHandler([
            new Response(200, ['content-type' => 'application/json; charset=utf-8'], $jsonAuth),
            new Response(200, ['content-type' => 'application/json; charset=utf-8'], $json),
        ]);

        $handlerStack = HandlerStack::create($mock);

        $requestHistory = [];
        $handlerStack->push(Middleware::history($requestHistory));

        $iiko = new IikoTransport([
            'url' => '/',
            'login' => 'demo',
            'http' => [
                'handler' => $handlerStack
            ]
        ]);

        $response = $iiko->retrieveById(new RetrieveByIdRequest);

        $this->assertCount(2, $requestHistory);

        $this->assertEquals('/api/1/deliveries/by_id', $requestHistory[1]['request']->getUri()->getPath());
        $this->assertEquals(200, $requestHistory[1]['response']->getStatusCode());

        $this->assertInstanceOf(RetrieveByIdResponse::class, $response);
        $this->assertEquals(RetrieveByIdResponse::fromJson($json), $response);
    }
}

<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use KMA\IikoTransport\Entities\Delivery\CreateDelivery\CreateDeliveryRequest;
use KMA\IikoTransport\Entities\Delivery\Response\CreateDeliveryResponse;
use KMA\IikoTransport\Entities\Menu\NomenclatureRequest;
use KMA\IikoTransport\Entities\Menu\NomenclatureResponse;
use KMA\IikoTransport\IikoTransport;
use PHPUnit\Framework\TestCase;

class DeliveryTest extends TestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::createDelivery
     */
    public function testCreateDelivery()
    {
        $jsonAuth = file_get_contents(dirname(__DIR__) . '/Fixtures/Endpoints/auth.json');
        $jsonCreateDelivery = file_get_contents(dirname(__DIR__) . '/Fixtures/Endpoints/createDelivery.json');

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

        $delivery = $iiko->createDelivery(new CreateDeliveryRequest);

        $this->assertCount(2, $requestHistory);

        /** @var \GuzzleHttp\Psr7\Request */
        $request = $requestHistory[1]['request'];
        /** @var \GuzzleHttp\Psr7\Response */
        $response = $requestHistory[1]['response'];

        $this->assertEquals('/api/1/deliveries/create', $request->getUri()->getPath());
        $this->assertEquals(200, $response->getStatusCode());

        $this->assertInstanceOf(CreateDeliveryResponse::class, $delivery);
        $this->assertEquals(CreateDeliveryResponse::fromJson($jsonCreateDelivery), $delivery);
    }
}

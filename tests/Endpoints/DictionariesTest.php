<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use KMA\IikoTransport\Entities\Dictionaries\PaymentTypes\PaymentTypesRequest;
use KMA\IikoTransport\Entities\Dictionaries\PaymentTypes\PaymentTypesResponse;
use KMA\IikoTransport\IikoTransport;
use KMA\IikoTransport\Tests\JsonFactory;
use PHPUnit\Framework\TestCase;

class DictionariesTest extends TestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::paymentTypes
     */
    public function testPaymentTypes()
    {
        $jsonAuth = JsonFactory::all('auth');
        $json = JsonFactory::all('Dictionaries/PaymentTypesResponse');

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

        $apiResponse = $iiko->paymentTypes(
            new PaymentTypesRequest(['organizationIds' => ['orgId']])
        );

        $this->assertCount(2, $requestHistory);

        /** @var \GuzzleHttp\Psr7\Request */
        $request = $requestHistory[1]['request'];
        /** @var \GuzzleHttp\Psr7\Response */
        $response = $requestHistory[1]['response'];

        $this->assertEquals('/api/1/payment_types', $request->getUri()->getPath());
        $this->assertEquals(200, $response->getStatusCode());

        $this->assertInstanceOf(PaymentTypesResponse::class, $apiResponse);
        $this->assertEquals(PaymentTypesResponse::fromJson($json), $apiResponse);
    }
}

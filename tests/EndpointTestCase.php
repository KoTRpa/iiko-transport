<?php

namespace KMA\IikoTransport\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use KMA\IikoTransport\IikoTransport;

abstract class EndpointTestCase extends \PHPUnit\Framework\TestCase
{
    protected function runTests(string $jsonNamespace, string $method, string $reqClass, string $resClass, string $apiPath): void
    {
        $jsonAuth = JsonFactory::all('auth');
        $json = JsonFactory::all($jsonNamespace);

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

        $response = $iiko->$method(new $reqClass);

        $this->assertCount(2, $requestHistory);

        $this->assertEquals($apiPath, $requestHistory[1]['request']->getUri()->getPath());
        $this->assertEquals(200, $requestHistory[1]['response']->getStatusCode());

        $this->assertInstanceOf($resClass, $response);
        $this->assertEquals($resClass::fromJson($json), $response);
    }
}

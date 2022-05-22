<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use KMA\IikoTransport\IikoTransport;
use KMA\IikoTransport\Tests\JsonFactory;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::accessToken
     */
    public function testAccessToken()
    {
        $jsonAuth = JsonFactory::load('Endpoints/auth')->get();

        $mock = new MockHandler([
            new Response(200, ['content-type' => 'application/json; charset=utf-8'], $jsonAuth),
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

        $token = $iiko->accessToken();

        $this->assertCount(1, $requestHistory);

        /** @var \GuzzleHttp\Psr7\Request */
        $request = $requestHistory[0]['request'];

        /** @var \GuzzleHttp\Psr7\Response */
        $response = $requestHistory[0]['response'];

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('/api/1/access_token', $request->getUri()->getPath());
        $this->assertEquals('string', $token);
    }
}

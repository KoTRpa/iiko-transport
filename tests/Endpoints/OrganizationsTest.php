<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use KMA\IikoTransport\Entities\Organizations\OrganizationsRequest;
use KMA\IikoTransport\Entities\Organizations\OrganizationsResponse;
use KMA\IikoTransport\IikoTransport;
use KMA\IikoTransport\Tests\JsonFactory;
use PHPUnit\Framework\TestCase;

class OrganizationsTest extends TestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::organizations
     */
    public function testNomenclature()
    {
        $jsonAuth = JsonFactory::all('auth');
        $json = JsonFactory::all('Organizations/OrganizationsResponse');

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

        $apiResponse = $iiko->organizations(
            new OrganizationsRequest([
                'organizationIds' => [],
                'returnAdditionalInfo' => false,
                'includeDisabled' => false,
            ])
        );

        $this->assertCount(2, $requestHistory);

        /** @var \GuzzleHttp\Psr7\Request */
        $request = $requestHistory[1]['request'];
        /** @var \GuzzleHttp\Psr7\Response */
        $response = $requestHistory[1]['response'];

        $this->assertEquals('/api/1/organizations', $request->getUri()->getPath());
        $this->assertEquals(200, $response->getStatusCode());

        $this->assertInstanceOf(OrganizationsResponse::class, $apiResponse);
        $this->assertEquals(OrganizationsResponse::fromJson($json), $apiResponse);
    }
}

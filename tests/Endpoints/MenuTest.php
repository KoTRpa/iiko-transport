<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use KMA\IikoTransport\Entities\Menu\NomenclatureRequest;
use KMA\IikoTransport\Entities\Menu\NomenclatureResponse;
use KMA\IikoTransport\IikoTransport;
use KMA\IikoTransport\Tests\JsonFactory;
use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::nomenclature
     */
    public function testNomenclature()
    {
        $jsonAuth = JsonFactory::load('auth')->get();
        $jsonNomenclature = JsonFactory::load('Menu/nomenclatureResponse')->get();

        $mock = new MockHandler([
            new Response(200, ['content-type' => 'application/json; charset=utf-8'], $jsonAuth),
            new Response(200, ['content-type' => 'application/json; charset=utf-8'], $jsonNomenclature),
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

        $req = new NomenclatureRequest([
            'organizationId' => 'orgId'
        ]);

        $nomenclature = $iiko->nomenclature($req);

        $this->assertCount(2, $requestHistory);

        /** @var \GuzzleHttp\Psr7\Request */
        $request = $requestHistory[1]['request'];
        /** @var \GuzzleHttp\Psr7\Response */
        $response = $requestHistory[1]['response'];

        $this->assertEquals('/api/1/nomenclature', $request->getUri()->getPath());
        $this->assertEquals(200, $response->getStatusCode());

        $this->assertInstanceOf(NomenclatureResponse::class, $nomenclature);
        $this->assertEquals(NomenclatureResponse::fromJson($jsonNomenclature), $nomenclature);
    }
}

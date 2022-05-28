<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use KMA\IikoTransport\Tests\EndpointTestCase;
use KMA\IikoTransport\Endpoints\General\Menu\NomenclatureRequest;
use KMA\IikoTransport\Endpoints\General\Menu\NomenclatureResponse;

class MenuTest extends EndpointTestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::nomenclature
     */
    public function testNomenclature()
    {
        $this->runTests(
            'Menu/NomenclatureResponse',
            'nomenclature',
            NomenclatureRequest::class,
            NomenclatureResponse::class,
            '/api/1/nomenclature'
        );
    }
}

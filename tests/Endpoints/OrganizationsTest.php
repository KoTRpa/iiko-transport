<?php

namespace KMA\IikoTransport\Tests\Endpoints;

use KMA\IikoTransport\Tests\EndpointTestCase;
use KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsRequest;
use KMA\IikoTransport\Endpoints\General\Organizations\OrganizationsResponse;

class OrganizationsTest extends EndpointTestCase
{
    /**
     * @covers \KMA\IikoTransport\IikoTransport::organizations
     */
    public function testNomenclature()
    {
        $this->runTests(
            'Organizations/OrganizationsResponse',
            'organizations',
            OrganizationsRequest::class,
            OrganizationsResponse::class,
            '/api/1/organizations'
        );
    }
}

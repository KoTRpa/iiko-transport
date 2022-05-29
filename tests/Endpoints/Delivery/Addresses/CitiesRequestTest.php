<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Addresses;

use KMA\IikoTransport\Endpoints\Delivery\Addresses\CitiesRequest;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Addresses\CitiesRequest
 */
class CitiesRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/CitiesRequest'
    ];
    protected string $entityClass = CitiesRequest::class;
    protected array $fields = [
        'organizationIds',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsArray($entity->organizationIds);
    }
}

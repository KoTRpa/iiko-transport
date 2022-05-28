<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Addresses;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\Addresses\CitiesRequest;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\Addresses\CitiesRequest
 */
class CitiesRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/CitiesRequest'
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

<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Addresses;

use KMA\IikoTransport\Endpoints\Delivery\Addresses\StreetsRequest;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Addresses\StreetsRequest
 */
class StreetsRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/StreetsRequest'
    ];
    protected string $entityClass = StreetsRequest::class;
    protected array $fields = [
        'organizationId',
        'cityId'
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->organizationId);
        $this->assertIsUuid($entity->cityId);
    }
}

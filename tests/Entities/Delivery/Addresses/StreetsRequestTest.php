<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Addresses;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\Addresses\StreetsRequest;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\Addresses\StreetsRequest
 */
class StreetsRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/StreetsRequest'
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

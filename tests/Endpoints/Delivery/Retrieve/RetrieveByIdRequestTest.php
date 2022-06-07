<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Retrieve;

use KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveDeliveryByIdRequest;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveDeliveryByIdRequest
 */
class RetrieveByIdRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RetrieveDeliveryByIdRequest'
    ];
    protected string $entityClass = RetrieveDeliveryByIdRequest::class;
    protected array $fields = [
        'organizationId',
        'orderIds',
        'sourceKeys',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->organizationId);
        $this->assertIsArray($entity->orderIds);
        $this->assertIsArray($entity->sourceKeys);
    }
}

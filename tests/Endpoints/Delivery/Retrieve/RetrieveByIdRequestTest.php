<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Retrieve;

use KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveByIdRequest;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Retrieve\RetrieveByIdRequest
 */
class RetrieveByIdRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RetrieveByIdRequest'
    ];
    protected string $entityClass = RetrieveByIdRequest::class;
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

<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Retrieve;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdRequest;

/**
 * @covers \KMA\IikoTransport\Entities\Delivery\Retrieve\RetrieveByIdRequest
 */
class RetrieveByIdRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Delivery/RetrieveByIdRequest'
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

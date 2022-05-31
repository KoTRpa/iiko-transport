<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Restrictions;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Endpoints\Delivery\Restrictions\DeliveryRestrictionsRequest;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Restrictions\DeliveryRestrictionsRequest
 */
class DeliveryRestrictionsRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/DiscountsRequest'
    ];
    protected string $entityClass = DeliveryRestrictionsRequest::class;
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

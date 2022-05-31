<?php

namespace KMA\IikoTransport\Tests\Endpoints\Delivery\Restrictions;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Endpoints\Delivery\Restrictions\DeliveryRestrictionsResponse;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictions;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\Delivery\Restrictions\DeliveryRestrictionsResponse
 */
class DeliveryRestrictionsResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RestrictionsResponse'
    ];
    protected string $entityClass = DeliveryRestrictionsResponse::class;
    protected array $fields = [
        'correlationId',
        'deliveryRestrictions',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertInstanceOf(Collection::class, $entity->deliveryRestrictions);
        $entity->deliveryRestrictions->each(function ($item) {
            $this->assertInstanceOf(DeliveryRestrictions::class, $item);
        });
    }
}

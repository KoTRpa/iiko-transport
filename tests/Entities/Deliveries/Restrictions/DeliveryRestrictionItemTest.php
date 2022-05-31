<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictionItem;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\DeliveryRestrictionItem
 */
class DeliveryRestrictionItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/RestrictionsResponse',
        'path' => 'deliveryRestrictions.restrictions'
    ];
    protected string $entityClass = DeliveryRestrictionItem::class;
    protected array $fields = [
        'minSum',
        'terminalGroupId',
        'organizationId',
        'zone',
        'weekMap',
        'from',
        'to',
        'priority',
        'deliveryDurationInMinutes',
        'deliveryServiceProductId',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsFloat($entity->minSum);
        $this->assertIsUuid($entity->terminalGroupId);
        $this->assertIsUuid($entity->organizationId);
        $this->assertIsString($entity->zone);
        $this->assertIsInt($entity->weekMap);
        $this->assertIsInt($entity->from);
        $this->assertIsInt($entity->to);
        $this->assertIsInt($entity->priority);
        $this->assertIsInt($entity->deliveryDurationInMinutes);
        $this->assertIsUuid($entity->deliveryServiceProductId);
    }
}

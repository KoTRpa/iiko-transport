<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Deliveries\Restrictions\AllowedItem;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\AllowedItem
 */
class AllowedItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/SuitableTerminalGroupsResponse',
        'path' => 'allowedItems'
    ];
    protected string $entityClass = AllowedItem::class;
    protected array $fields = [
        'terminalGroupId',
        'organizationId',
        'deliveryDurationInMinutes',
        'zone',
        'deliveryServiceProductId',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->terminalGroupId);
        $this->assertIsUuid($entity->organizationId);
        $this->assertIsInt($entity->deliveryDurationInMinutes);
        $this->assertIsString($entity->zone);
        $this->assertIsUuid($entity->deliveryServiceProductId);
    }
}

<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Restrictions;

use KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItem;
use KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItemData;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Restrictions\RejectItem
 */
class RejectItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/SuitableTerminalGroupsResponse',
        'path' => 'rejectedItems'
    ];
    protected string $entityClass = RejectItem::class;
    protected array $fields = [
        'terminalGroupId',
        'organizationId',
        'zone',
        'rejectCode',
        'rejectHint',
        'rejectItemData',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->terminalGroupId);
        $this->assertIsUuid($entity->organizationId);
        $this->assertIsString($entity->zone);
        $this->assertIsString($entity->rejectCode);
        $this->assertIsString($entity->rejectHint);
        $this->assertInstanceOf(RejectItemData::class, $entity->rejectItemData);
    }
}

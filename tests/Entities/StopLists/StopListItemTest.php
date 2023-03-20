<?php

namespace KMA\IikoTransport\Tests\Entities\StopLists;

use KMA\IikoTransport\Entities\StopLists\StopListItem;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\StopLists\StopListItem
 */
class StopListItemTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/OutOfStockResponse',
        'path' => 'terminalGroupStopLists.items.items'
    ];
    protected string $entityClass = StopListItem::class;
    protected array $fields = [
        'balance',
        'productId',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsFloat($entity->balance);
        $this->assertIsUuid($entity->productId);
    }
}

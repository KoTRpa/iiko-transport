<?php

namespace KMA\IikoTransport\Tests\Entities\StopLists;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\StopLists\TerminalGroupStopList;
use KMA\IikoTransport\Entities\StopLists\StopListItem;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\StopLists\TerminalGroupStopList
 */
class TerminalGroupStopListTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/OutOfStockResponse',
        'path' => 'terminalGroupStopLists.items'
    ];
    protected string $entityClass = TerminalGroupStopList::class;
    protected array $fields = [
        'terminalGroupId',
        'items',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->terminalGroupId);
        $this->assertInstanceOf(Collection::class, $entity->items);
        $entity->items->each(function($item) {
            $this->assertInstanceOf(StopListItem::class, $item);
        });
    }
}

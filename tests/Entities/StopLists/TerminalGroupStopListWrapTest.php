<?php

namespace KMA\IikoTransport\Tests\Entities\StopLists;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\StopLists\TerminalGroupStopList;
use KMA\IikoTransport\Entities\StopLists\TerminalGroupStopListWrap;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\StopLists\TerminalGroupStopListWrap
 */
class TerminalGroupStopListWrapTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Menu/OutOfStockResponse',
        'path' => 'terminalGroupStopLists'
    ];
    protected string $entityClass = TerminalGroupStopListWrap::class;
    protected array $fields = [
        'organizationId',
        'items',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->organizationId);
        $this->assertInstanceOf(Collection::class, $entity->items);
        $entity->items->each(function($item) {
            $this->assertInstanceOf(TerminalGroupStopList::class, $item);
        });
    }
}

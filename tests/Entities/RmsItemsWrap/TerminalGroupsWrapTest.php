<?php

namespace KMA\IikoTransport\Tests\Entities\RmsItemsWrap;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\RmsItemsWrap\TerminalGroupsWrap;
use KMA\IikoTransport\Entities\Terminals\TerminalGroup;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\RmsItemsWrap\TerminalGroupsWrap
 */
class TerminalGroupsWrapTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'TerminalGroups/TerminalGroupsResponse',
        'path' => 'terminalGroups',
    ];
    protected string $entityClass = TerminalGroupsWrap::class;
    protected array $fields = [
        'organizationId',
        'items',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->organizationId);
        $this->assertInstanceOf(Collection::class, $entity->items);
        $entity->items->each(function ($item): void {
            $this->assertInstanceOf(TerminalGroup::class, $item);
        });
    }
}

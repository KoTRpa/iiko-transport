<?php

namespace KMA\IikoTransport\Tests\Entities\TerminalGroups;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsByOrganization;
use KMA\IikoTransport\Entities\Common\Terminals\TerminalGroup;

/**
 * @covers \KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsByOrganization
 */
class TerminalGroupsByOrganizationTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'TerminalGroups/TerminalGroupsResponse',
        'path' => 'terminalGroups',
    ];
    protected string $entityClass = TerminalGroupsByOrganization::class;
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

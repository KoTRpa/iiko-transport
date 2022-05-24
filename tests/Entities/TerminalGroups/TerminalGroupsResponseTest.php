<?php

namespace KMA\IikoTransport\Tests\Entities\TerminalGroups;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsByOrganization;
use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsResponse;

/**
 * @covers \KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsResponse
 */
class TerminalGroupsResponseTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'TerminalGroups/TerminalGroupsResponse',
    ];
    protected string $entityClass = TerminalGroupsResponse::class;
    protected array $fields = [
        'correlationId',
        'terminalGroups',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->correlationId);
        $this->assertInstanceOf(Collection::class, $entity->terminalGroups);
        $entity->terminalGroups->each(function ($item): void {
            $this->assertInstanceOf(TerminalGroupsByOrganization::class, $item);
        });
    }
}

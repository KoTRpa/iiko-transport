<?php

namespace KMA\IikoTransport\Tests\Endpoints\General\TerminalGroups;

use Illuminate\Support\Collection;
use KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsResponse;
use KMA\IikoTransport\Entities\RmsItemsWrap\TerminalGroupsWrap;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Endpoints\General\TerminalGroups\TerminalGroupsResponse
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
            $this->assertInstanceOf(TerminalGroupsWrap::class, $item);
        });
    }
}

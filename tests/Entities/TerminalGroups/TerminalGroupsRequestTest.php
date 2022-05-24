<?php

namespace KMA\IikoTransport\Tests\Entities\TerminalGroups;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsRequest;

/**
 * @covers \KMA\IikoTransport\Entities\TerminalGroups\TerminalGroupsRequest
 */
class TerminalGroupsRequestTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'TerminalGroups/TerminalGroupsRequest',
    ];
    protected string $entityClass = TerminalGroupsRequest::class;
    protected array $fields = [
        'organizationIds',
        'includeDisabled',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsArray($entity->organizationIds);
        $this->assertIsBool($entity->includeDisabled);
    }
}

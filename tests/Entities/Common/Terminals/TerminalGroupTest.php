<?php

namespace KMA\IikoTransport\Tests\Entities\Common\Terminals;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Common\Terminals\TerminalGroup;

/**
 * @covers \KMA\IikoTransport\Entities\Common\Terminals\TerminalGroup
 */
class TerminalGroupTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Dictionaries/PaymentTypesResponse',
        'path' => 'paymentTypes.terminalGroups',
    ];
    protected string $entityClass = TerminalGroup::class;
    protected array $fields = [
        'id',
        'organizationId',
        'name',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsUuid($entity->organizationId);
        $this->assertIsString($entity->name);
    }
}

<?php

namespace KMA\IikoTransport\Tests\Entities;

use KMA\IikoTransport\Tests\EntityTestCase;

class GuestsTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Guests.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Guests::class;
    protected array $fields = [
        'count',
        'splitBetweenPersons',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsInt($entity->count);
        $this->assertIsBool($entity->splitBetweenPersons);
    }
}

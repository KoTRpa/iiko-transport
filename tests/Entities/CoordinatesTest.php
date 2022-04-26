<?php

namespace KMA\IikoTransport\Tests\Entities;

use KMA\IikoTransport\Tests\EntityTestCase;

class CoordinatesTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Coordinates.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Coordinates::class;
    protected array $fields = [
        'latitude',
        'longitude',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsFloat($entity->latitude);
        $this->assertIsFloat($entity->longitude);
    }
}

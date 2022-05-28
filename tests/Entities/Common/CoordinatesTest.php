<?php

namespace KMA\IikoTransport\Tests\Entities\Common;

use KMA\IikoTransport\Tests\EntityTestCase;
use KMA\IikoTransport\Entities\Common\Coordinates;

/**
 * @covers \KMA\IikoTransport\Entities\Common\Coordinates
 */
class CoordinatesTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Common/Coordinates'
    ];
    protected string $entityClass = Coordinates::class;
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

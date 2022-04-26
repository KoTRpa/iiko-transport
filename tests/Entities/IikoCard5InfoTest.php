<?php

namespace KMA\IikoTransport\Tests\Entities;

use KMA\IikoTransport\Tests\EntityTestCase;

class IikoCard5InfoTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/IikoCard5Info.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\IikoCard5Info::class;
    protected array $fields = [
        'coupon',
        'applicableManualConditions',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsString($entity->coupon);
        $this->assertIsArray($entity->applicableManualConditions);
    }
}

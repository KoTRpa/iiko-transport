<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class OperatorTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Operator.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Operator::class;
    protected array $fields = [
        'id',
        'name',
        'phone',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->phone);
    }
}

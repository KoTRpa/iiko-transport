<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Operator;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\Operator
 */
class OperatorTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.operator'
    ];
    protected string $entityClass = Operator::class;
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

<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderCombo;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderCombo
 */
class OrderComboTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.combos'
    ];
    protected string $entityClass = OrderCombo::class;
    protected array $fields = [
        'id',
        'name',
        'amount',
        'price',
        'sourceId',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsInt($entity->amount);
        $this->assertIsFloat($entity->price);
        $this->assertIsUuid($entity->sourceId);
    }
}

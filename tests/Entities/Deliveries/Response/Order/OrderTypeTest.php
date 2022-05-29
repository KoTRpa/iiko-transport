<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderType;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\OrderType
 */
class OrderTypeTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.orderType'
    ];
    protected string $entityClass = OrderType::class;
    protected array $fields = [
        'id',
        'name',
        'orderServiceType',
    ];

    public function testCreateEntity(): void
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity($entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->orderServiceType);
        $this->assertContains($entity->orderServiceType, [
            'Common',
            'DeliveryByCourier',
            'DeliveryByClient',
        ]);
    }
}

<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class OrderTypeTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/OrderType.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\OrderType::class;
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

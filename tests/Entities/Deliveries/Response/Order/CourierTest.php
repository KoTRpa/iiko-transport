<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Courier;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\Courier
 */
class CourierTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.courierInfo.courier'
    ];
    protected string $entityClass = Courier::class;
    protected array $fields = [
        'id',
        'name',
        'phone',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
        $this->assertIsString($entity->phone);
    }
}

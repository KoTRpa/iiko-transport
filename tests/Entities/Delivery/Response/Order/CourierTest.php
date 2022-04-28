<?php

namespace KMA\IikoTransport\Tests\Entities\Delivery\Response\Order;

use KMA\IikoTransport\Tests\EntityTestCase;

class CourierTest extends EntityTestCase
{
    protected string $jsonPath = __DIR__ . '/Courier.json';
    protected string $entityClass = \KMA\IikoTransport\Entities\Delivery\Response\Order\Courier::class;
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

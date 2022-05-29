<?php

namespace KMA\IikoTransport\Tests\Entities\Deliveries\Response\Order;

use KMA\IikoTransport\Entities\Deliveries\Response\Order\Size;
use KMA\IikoTransport\Tests\EntityTestCase;

/**
 * @covers \KMA\IikoTransport\Entities\Deliveries\Response\Order\Size
 */
class SizeTest extends EntityTestCase
{
    protected array $fixture = [
        'name' => 'Deliveries/ResponseOrderInfo',
        'path' => 'order.items.size'
    ];
    protected string $entityClass = Size::class;
    protected array $fields = [
        'id',
        'name',
    ];

    public function testEntityCreate()
    {
        $this->runCreateTests();
    }

    protected function assertFieldValidity(mixed $entity): void
    {
        $this->assertIsUuid($entity->id);
        $this->assertIsString($entity->name);
    }
}
